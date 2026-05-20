import uvicorn
from fastapi import FastAPI, HTTPException, Depends
from fastapi.middleware.cors import CORSMiddleware
from sqlalchemy.orm import Session
from sqlalchemy import text

# Import Database & ML Logic
from .database import get_db
from . import ml_engine
from .sys_logger import log

app = FastAPI(title="SportStore AI Real Recommendation Service")

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.get("/")
def read_root():
    return {"status": "ok", "message": "SportStore ML Service is running normally on port 8001"}

@app.get("/api/v1/health")
def health_check():
    return {"status": "healthy", "service": "sportstore-ai"}

@app.get("/api/v1/test-db")
def test_db_connection(db: Session = Depends(get_db)):
    """
    Thực hiện query đơn giản để kiểm tra kết nối Database MySQL
    """
    log.info("Nhận Request API: GET /api/v1/test-db")
    try:
        # Thực hiện SELECT 1 để kiểm tra ping tới MySQL
        db.execute(text("SELECT 1"))
        return {
            "success": True,
            "message": "Kết nối Database MySQL thành công!",
            "database": "sportstore_be"
        }
    except Exception as e:
        log.error(f"Lỗi kết nối DB: {str(e)}")
        raise HTTPException(status_code=500, detail=f"Không thể kết nối Database: {str(e)}")

@app.get("/api/v1/recommend/popular")
def get_popular_recommendations(db: Session = Depends(get_db)):
    """
    Tính Popular score từ Database và log lại.
    """
    log.info("Nhận Request API: GET /api/v1/recommend/popular")
    try:
        popular_ids = ml_engine.get_popular_items(db, top_n=8)
        return {
            "success": True,
            "message": "Danh sách sản phẩm phổ biến nhất hệ thống",
            "data": popular_ids
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/api/v1/recommend/user/{user_id}")
def get_personalized_recommendations(user_id: int, db: Session = Depends(get_db)):
    """
    Lấy điểm gợi ý cá nhân hóa dựa vào Collaborative Filtering
    """
    log.info(f"Nhận Request API: GET /api/v1/recommend/user/{user_id}")
    if user_id <= 0:
        log.error(f"Request từ chối: user_id={user_id} không hợp lệ")
        raise HTTPException(status_code=400, detail="Trường user_id không hợp lệ")
    
    try:
        recommended_ids = ml_engine.get_item_based_recommendations(user_id=user_id, db=db, top_n=8)
        return {
            "success": True,
            "message": f"ML Personalized Recommendation cho user {user_id}",
            "data": recommended_ids
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/api/v1/recommend/item/{product_id}")
def get_similar_item_recommendations(product_id: int, db: Session = Depends(get_db)):
    """
    Lấy danh sách sản phẩm tương tự dựa trên Item-Item Cosine Similarity.
    Dùng cho trang chi tiết sản phẩm.
    """
    log.info(f"Nhận Request API: GET /api/v1/recommend/item/{product_id}")
    if product_id <= 0:
        raise HTTPException(status_code=400, detail="product_id không hợp lệ")
    
    try:
        similar_ids = ml_engine.get_similar_items(product_id=product_id, db=db, top_n=12)
        return {
            "success": True,
            "message": f"Sản phẩm tương tự với item {product_id}",
            "data": similar_ids
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/api/v1/recommend/debug/{user_id}")
def debug_recommendation(user_id: int, db: Session = Depends(get_db)):
    """
    [DEMO] Trả về toàn bộ thông tin quá trình tính gợi ý cho hội đồng.
    """
    import pandas as pd
    from sklearn.metrics.pairwise import cosine_similarity as cos_sim

    df_raw = ml_engine.fetch_behavior_data(db)
    if df_raw.empty:
        return {"success": False, "message": "Chưa có dữ liệu hành vi"}

    df = ml_engine.process_behavior_scores(df_raw)

    if user_id not in df['nguoi_dung_id'].values:
        return {
            "success": True,
            "mode": "COLD-START",
            "message": f"User {user_id} chưa có lịch sử tương tác → Fallback Popular Items",
            "user_id": user_id,
            "user_history": {},
            "recommended_ids": ml_engine.get_popular_items(db, 8),
        }

    user_item_matrix = df.pivot(index='nguoi_dung_id', columns='san_pham_id', values='score').fillna(0)
    item_similarity = cos_sim(user_item_matrix.T)
    item_sim_df = pd.DataFrame(item_similarity, index=user_item_matrix.columns, columns=user_item_matrix.columns)

    user_history = user_item_matrix.loc[user_id]
    user_interacted = user_history[user_history > 0]

    predicted_scores = {}
    all_items = user_item_matrix.columns.tolist()
    for unseen in [i for i in all_items if i not in user_interacted.index.tolist()]:
        score_sum = sum(item_sim_df.loc[unseen, it] * user_history[it] for it in user_interacted.index)
        sim_sum   = sum(item_sim_df.loc[unseen, it] for it in user_interacted.index)
        predicted_scores[unseen] = round(score_sum / sim_sum, 4) if sim_sum > 0 else 0

    sorted_scores = sorted(predicted_scores.items(), key=lambda x: x[1], reverse=True)

    return {
        "success": True,
        "mode": "PERSONALIZED (Item-based Collaborative Filtering)",
        "user_id": user_id,
        "matrix_size": f"{user_item_matrix.shape[0]} users × {user_item_matrix.shape[1]} items",
        "user_history": {
            int(k): {"diem_tuong_tac": float(v), "hanh_vi": _explain_score(float(v))}
            for k, v in user_interacted.items()
        },
        "top10_predicted_scores": [
            {"san_pham_id": int(k), "diem_du_bao": v} for k, v in sorted_scores[:10]
        ],
        "recommended_ids": [k for k, _ in sorted_scores[:8]],
    }

def _explain_score(score: float) -> str:
    if score >= 10: return "mua_hang + xem nhiều"
    if score >= 5:  return "mua_hang"
    if score >= 4:  return "them_gio_hang"
    if score >= 3:  return "yeu_thich"
    if score >= 2:  return "click"
    return "xem"


if __name__ == "__main__":
    uvicorn.run("app.main:app", host="0.0.0.0", port=8001, reload=True)
