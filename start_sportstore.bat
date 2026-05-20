@echo off
chcp 65001 >nul
title SportStore KLTN - Launcher

:: ──────────────────────────────────────────────
:: Thư mục gốc — SỬA đường dẫn này cho đúng máy
:: ──────────────────────────────────────────────
set ROOT_DIR=C:\DATN\KLTN_94_NGOC

echo.
echo  ======================================================
echo   Khoi dong he thong SportStore KLTN
echo  ======================================================
echo.

:: 1. Backend Laravel (Port 8000)
echo  [1/5] Backend Laravel - Port 8000...
start "Backend Laravel" cmd /k "cd /d %ROOT_DIR%\sportstore-be && echo Khoi dong Backend Laravel... && php artisan serve"

timeout /t 2 /nobreak >nul

:: 2. Queue Worker
echo  [2/5] Queue Worker...
start "Queue Worker" cmd /k "cd /d %ROOT_DIR%\sportstore-be && echo Khoi dong Queue Worker... && php artisan queue:work"

timeout /t 1 /nobreak >nul

:: 3. Schedule Worker (auto-cancel don chua thanh toan, etc.)
echo  [3/5] Schedule Worker...
start "Schedule Worker" cmd /k "cd /d %ROOT_DIR%\sportstore-be && echo Khoi dong Schedule Worker... && php artisan schedule:work"

timeout /t 1 /nobreak >nul

:: 4. Frontend NextJS (Port 3000)
echo  [4/5] Frontend NextJS - Port 3000...
start "Frontend NextJS" cmd /k "cd /d %ROOT_DIR%\sportstore-client && echo Khoi dong Frontend NextJS... && yarn dev"

timeout /t 1 /nobreak >nul

:: 5. AI Recommendation Service (FastAPI - Port 8001)
echo  [5/5] AI Recommendation Engine - Port 8001...
start "AI Service" cmd /k "cd /d %ROOT_DIR%\sportstore-ai && echo Khoi dong AI Recommendation Engine... && call venv\Scripts\activate && uvicorn app.main:app --host 0.0.0.0 --port 8001 --reload"

timeout /t 1 /nobreak >nul

:: 6. Laravel Reverb WebSocket (Port 8080)
echo  [6/5] Laravel Reverb WebSocket - Port 8080...
start "Reverb WebSocket" cmd /k "cd /d %ROOT_DIR%\sportstore-be && echo Khoi dong Laravel Reverb... && php artisan reverb:start --host=0.0.0.0"

echo.
echo  ======================================================
echo   Da mo 6 cua so lenh!
echo  ======================================================
echo.
echo   - Frontend  :  http://localhost:3000
echo   - Backend   :  http://localhost:8000
echo   - AI API    :  http://localhost:8001
echo   - Reverb    :  ws://localhost:8080
echo.
echo   Luu y: Doi cac service khoi dong xong roi moi dung.
echo          AI Service can kich hoat venv truoc.
echo.
pause
