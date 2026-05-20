'use client';

import { useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import apiClient from '@/lib/api';
import {
    Brain, Users, Activity, ShoppingBag, Eye, Heart,
    ShoppingCart, TrendingUp, Sparkles, User, AlertCircle,
    BarChart2, ArrowRight, Loader2, Star
} from 'lucide-react';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import Image from 'next/image';
import Link from 'next/link';

// ─── API helpers ─────────────────────────────────────────────────────────────

const fetchOverview = () =>
    apiClient.get('/admin/ai/overview').then((r: any) => r.data);

const fetchUserList = () =>
    apiClient.get('/admin/ai/users').then((r: any) => r.data);

const fetchUserProfile = (userId: number) =>
    apiClient.get(`/admin/ai/user/${userId}`).then((r: any) => r.data);

// ─── Constants ───────────────────────────────────────────────────────────────

const BEHAVIOR_WEIGHTS: Record<string, { score: number; color: string; icon: React.ElementType; label: string }> = {
    mua_hang:      { score: 5.0, color: 'bg-emerald-500', icon: ShoppingBag, label: 'Mua hàng' },
    them_gio_hang: { score: 4.0, color: 'bg-blue-500',    icon: ShoppingCart, label: 'Thêm giỏ' },
    yeu_thich:     { score: 3.0, color: 'bg-rose-500',    icon: Heart,       label: 'Yêu thích' },
    click:         { score: 2.0, color: 'bg-amber-500',   icon: Activity,    label: 'Click' },
    xem:           { score: 1.0, color: 'bg-slate-400',   icon: Eye,         label: 'Xem' },
};

const MODE_LABELS: Record<string, { label: string; color: string; desc: string }> = {
    'COLD-START': {
        label: 'Cold Start',
        color: 'bg-amber-100 text-amber-700 border-amber-200',
        desc: 'Chưa đủ dữ liệu → trả về sản phẩm phổ biến',
    },
    'PERSONALIZED (Item-based Collaborative Filtering)': {
        label: 'Cá nhân hóa',
        color: 'bg-emerald-100 text-emerald-700 border-emerald-200',
        desc: 'Item-based Collaborative Filtering',
    },
};

// ─── Sub-components ──────────────────────────────────────────────────────────

function StatCard({ icon: Icon, label, value, sub, color }: {
    icon: React.ElementType; label: string; value: string | number; sub?: string; color: string;
}) {
    return (
        <Card className="border-slate-200/60 shadow-sm">
            <CardContent className="p-5 flex items-center gap-4">
                <div className={`h-12 w-12 rounded-2xl ${color} flex items-center justify-center shrink-0`}>
                    <Icon className="h-6 w-6 text-white" />
                </div>
                <div>
                    <p className="text-2xl font-bold text-slate-900">{value.toLocaleString()}</p>
                    <p className="text-sm font-medium text-slate-600">{label}</p>
                    {sub && <p className="text-xs text-slate-400 mt-0.5">{sub}</p>}
                </div>
            </CardContent>
        </Card>
    );
}

function ScoreBar({ score, max, color }: { score: number; max: number; color: string }) {
    const pct = Math.min((score / max) * 100, 100);
    return (
        <div className="h-2 bg-slate-100 rounded-full overflow-hidden w-full">
            <div className={`h-full ${color} rounded-full transition-all`} style={{ width: `${pct}%` }} />
        </div>
    );
}

// ─── Main Page ───────────────────────────────────────────────────────────────

export default function AiDashboardPage() {
    const [selectedUserId, setSelectedUserId] = useState<number | null>(null);
    const [search, setSearch] = useState('');
    const [showDropdown, setShowDropdown] = useState(false);

    const { data: overview, isLoading: loadingOverview } = useQuery({
        queryKey: ['admin', 'ai', 'overview'],
        queryFn: fetchOverview,
    });

    const { data: userList = [] } = useQuery({
        queryKey: ['admin', 'ai', 'users'],
        queryFn: fetchUserList,
    });

    const { data: profile, isLoading: loadingProfile, isFetching } = useQuery({
        queryKey: ['admin', 'ai', 'profile', selectedUserId],
        queryFn: () => fetchUserProfile(selectedUserId!),
        enabled: !!selectedUserId,
    });

    const stats = overview?.stats;
    const topUsers = overview?.top_users ?? [];
    const weights = overview?.trong_so ?? {};

    const filteredUsers = (userList as any[]).filter((u: any) =>
        !search || u.ho_va_ten.toLowerCase().includes(search.toLowerCase()) || u.email.toLowerCase().includes(search.toLowerCase())
    );
    const selectedUser = (userList as any[]).find((u: any) => u.id === selectedUserId);

    const modeInfo = profile ? (MODE_LABELS[profile.mode] ?? {
        label: profile.mode,
        color: 'bg-slate-100 text-slate-700',
        desc: '',
    }) : null;

    return (
        <div className="space-y-8 p-1">

            {/* ── Header ── */}
            <div className="flex items-center gap-3">
                <div className="h-10 w-10 rounded-2xl bg-violet-100 flex items-center justify-center">
                    <Brain className="h-5 w-5 text-violet-600" />
                </div>
                <div>
                    <h1 className="text-2xl font-bold text-slate-900">AI Cá nhân hóa</h1>
                    <p className="text-sm text-slate-500">Item-based Collaborative Filtering · Cosine Similarity</p>
                </div>
            </div>

            {/* ── Stats row ── */}
            {loadingOverview ? (
                <div className="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    {[...Array(4)].map((_, i) => (
                        <Card key={i} className="border-slate-200/60">
                            <CardContent className="p-5">
                                <div className="h-12 w-12 bg-slate-100 rounded-2xl animate-pulse mb-3" />
                                <div className="h-6 w-16 bg-slate-100 rounded animate-pulse mb-1" />
                                <div className="h-4 w-24 bg-slate-100 rounded animate-pulse" />
                            </CardContent>
                        </Card>
                    ))}
                </div>
            ) : (
                <div className="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <StatCard icon={Activity}     label="Tổng hành vi"      value={stats?.tong_hanh_vi ?? 0}     sub="Toàn hệ thống"           color="bg-violet-500" />
                    <StatCard icon={Users}        label="User cá nhân hóa" value={stats?.users_co_hanh_vi ?? 0}  sub={`/ ${stats?.tong_khach_hang ?? 0} khách hàng`} color="bg-indigo-500" />
                    <StatCard icon={ShoppingBag}  label="Lượt mua ghi nhận" value={stats?.theo_loai?.mua_hang ?? 0}  sub="hanh_vi = mua_hang"    color="bg-emerald-500" />
                    <StatCard icon={Eye}          label="Lượt xem sản phẩm" value={stats?.theo_loai?.xem ?? 0}    sub="hanh_vi = xem"           color="bg-sky-500" />
                </div>
            )}

            {/* ── Matrix info + Behavior weights ── */}
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {/* Matrix size */}
                <Card className="border-slate-200/60 shadow-sm">
                    <CardHeader className="pb-3">
                        <CardTitle className="text-base font-bold text-slate-800 flex items-center gap-2">
                            <BarChart2 className="h-4 w-4 text-violet-500" />
                            Ma trận User × Item
                        </CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        {/* Matrix size badge */}
                        <div className="rounded-xl bg-gradient-to-br from-violet-50 to-indigo-50 border border-violet-100 p-4 text-center">
                            <p className="text-3xl font-black text-violet-600 tracking-tight">
                                {stats?.matrix_size ?? '—'}
                            </p>
                            <p className="text-xs text-slate-500 mt-1">Kích thước ma trận hiện tại</p>
                        </div>

                        {/* Stats row */}
                        <div className="grid grid-cols-2 gap-2 text-sm">
                            <div className="rounded-lg bg-slate-50 border border-slate-100 p-2.5 text-center">
                                <p className="font-bold text-slate-800">{stats?.hanh_vi_guest?.toLocaleString() ?? 0}</p>
                                <p className="text-xs text-slate-400 mt-0.5">Hành vi Guest</p>
                            </div>
                            <div className="rounded-lg bg-slate-50 border border-slate-100 p-2.5 text-center">
                                <p className="font-bold text-slate-800">{stats?.tong_hanh_vi?.toLocaleString() ?? 0}</p>
                                <p className="text-xs text-slate-400 mt-0.5">Tổng records</p>
                            </div>
                        </div>

                        {/* Steps */}
                        <div className="space-y-1.5">
                            {[
                                { n: '①', text: 'Dựng ma trận User × Item từ dữ liệu hành vi có trọng số' },
                                { n: '②', text: 'Transpose → tính Cosine Similarity ma trận Item × Item' },
                                { n: '③', text: 'Với mỗi item chưa tương tác, áp công thức dự báo điểm' },
                                { n: '④', text: 'Sắp xếp giảm dần → trả Top-N sản phẩm gợi ý' },
                            ].map(s => (
                                <div key={s.n} className="flex items-start gap-2 text-xs text-slate-600">
                                    <span className="text-violet-500 font-bold shrink-0">{s.n}</span>
                                    <span>{s.text}</span>
                                </div>
                            ))}
                        </div>
                    </CardContent>
                </Card>

                {/* Behavior weights */}
                <Card className="border-slate-200/60 shadow-sm">
                    <CardHeader className="pb-3">
                        <CardTitle className="text-base font-bold text-slate-800 flex items-center gap-2">
                            <Star className="h-4 w-4 text-amber-500" />
                            Trọng số hành vi (BEHAVIOR_WEIGHTS)
                        </CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-3">
                        {/* Weight bars — chỉ hiện những loại có dữ liệu */}
                        {Object.entries(BEHAVIOR_WEIGHTS).map(([key, cfg]) => {
                            const Icon = cfg.icon;
                            const count = stats?.theo_loai?.[key] ?? 0;
                            if (count === 0) return null;
                            const totalScore = cfg.score * count;
                            return (
                                <div key={key} className="flex items-center gap-3">
                                    <div className={`h-8 w-8 rounded-lg ${cfg.color} flex items-center justify-center shrink-0`}>
                                        <Icon className="h-4 w-4 text-white" />
                                    </div>
                                    <div className="flex-1 min-w-0">
                                        <div className="flex justify-between items-center mb-1">
                                            <span className="text-sm font-medium text-slate-700">{cfg.label}</span>
                                            <div className="flex items-center gap-1.5">
                                                <span className="text-xs text-slate-400">{count.toLocaleString()} lần</span>
                                                <span className="text-xs text-slate-300">×</span>
                                                <Badge variant="outline" className="text-xs font-bold px-1.5 h-5">
                                                    {cfg.score}
                                                </Badge>
                                                <span className="text-xs text-slate-300">=</span>
                                                <span className="text-xs font-bold text-slate-600 w-16 text-right">
                                                    {totalScore.toLocaleString()} điểm
                                                </span>
                                            </div>
                                        </div>
                                        <ScoreBar score={cfg.score} max={5} color={cfg.color} />
                                    </div>
                                </div>
                            );
                        })}

                        {/* Total score */}
                        <div className="rounded-lg bg-slate-50 border border-slate-200 p-2.5 flex justify-between items-center mt-1">
                            <span className="text-xs font-semibold text-slate-600">Tổng điểm toàn hệ thống</span>
                            <span className="text-sm font-black text-violet-600">
                                {Object.entries(BEHAVIOR_WEIGHTS).reduce((sum, [key, cfg]) => {
                                    return sum + cfg.score * (stats?.theo_loai?.[key] ?? 0);
                                }, 0).toLocaleString()} điểm
                            </span>
                        </div>
                    </CardContent>
                </Card>
            </div>

            {/* ── User profile lookup ── */}
            <Card className="border-slate-200/60 shadow-sm">
                <CardHeader className="pb-4">
                    <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <CardTitle className="text-base font-bold text-slate-800 flex items-center gap-2">
                            <Sparkles className="h-4 w-4 text-indigo-500" />
                            Tra cứu AI Profile người dùng
                        </CardTitle>
                        <div className="relative w-full sm:w-80">
                            <Input
                                placeholder="🔍 Tìm tên hoặc email khách hàng..."
                                value={selectedUser && !showDropdown ? `${selectedUser.ho_va_ten} — ${selectedUser.email}` : search}
                                onChange={e => { setSearch(e.target.value); setShowDropdown(true); setSelectedUserId(null); }}
                                onFocus={() => setShowDropdown(true)}
                                onBlur={() => setTimeout(() => setShowDropdown(false), 150)}
                                className="rounded-xl bg-white pr-8"
                            />
                            {selectedUserId && (
                                <button onClick={() => { setSelectedUserId(null); setSearch(''); }}
                                    className="absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 text-xs">✕</button>
                            )}
                            {showDropdown && filteredUsers.length > 0 && (
                                <div className="absolute z-50 top-full mt-1 w-full bg-white border border-slate-200 rounded-xl shadow-lg max-h-60 overflow-y-auto">
                                    {filteredUsers.map((u: any) => (
                                        <button key={u.id}
                                            className="w-full text-left px-4 py-2.5 hover:bg-indigo-50 transition-colors"
                                            onMouseDown={() => { setSelectedUserId(u.id); setSearch(''); setShowDropdown(false); }}
                                        >
                                            <p className="text-sm font-semibold text-slate-800">{u.ho_va_ten}</p>
                                            <p className="text-xs text-slate-400">{u.email}</p>
                                        </button>
                                    ))}
                                </div>
                            )}
                            {showDropdown && search && filteredUsers.length === 0 && (
                                <div className="absolute z-50 top-full mt-1 w-full bg-white border border-slate-200 rounded-xl shadow-lg p-4 text-sm text-slate-400 text-center">
                                    Không tìm thấy khách hàng
                                </div>
                            )}
                        </div>
                    </div>
                </CardHeader>

                <CardContent>
                    {/* Empty state */}
                    {!selectedUserId && (
                        <div className="flex flex-col items-center justify-center py-16 text-slate-400 space-y-2">
                            <Brain className="h-12 w-12 text-slate-200" />
                            <p className="font-medium text-slate-500">Chọn một khách hàng để xem AI phân tích</p>
                            <p className="text-sm">Hệ thống sẽ hiển thị lịch sử hành vi, điểm Cosine và sản phẩm được gợi ý</p>
                        </div>
                    )}

                    {/* Loading */}
                    {selectedUserId && (loadingProfile || isFetching) && (
                        <div className="flex items-center justify-center py-16 gap-3 text-slate-500">
                            <Loader2 className="h-5 w-5 animate-spin text-violet-500" />
                            <span>Đang tính toán Cosine Similarity...</span>
                        </div>
                    )}

                    {/* Profile result */}
                    {profile && !isFetching && (
                        <div className="space-y-6">

                            {/* User info + mode badge */}
                            <div className="flex flex-wrap items-center gap-3 p-4 bg-slate-50 rounded-xl border border-slate-100">
                                <div className="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center shrink-0">
                                    <User className="h-5 w-5 text-indigo-600" />
                                </div>
                                <div className="flex-1">
                                    <p className="font-bold text-slate-900">{profile.user.ho_va_ten}</p>
                                    <p className="text-sm text-slate-500">{profile.user.email}</p>
                                </div>
                                {modeInfo && (
                                    <div className="flex flex-col items-end gap-1">
                                        <Badge className={`${modeInfo.color} border font-bold px-3`}>
                                            {modeInfo.label}
                                        </Badge>
                                        <span className="text-xs text-slate-400">{modeInfo.desc}</span>
                                    </div>
                                )}
                                {profile.matrix_size && (
                                    <Badge variant="outline" className="text-violet-700 border-violet-200 bg-violet-50 font-mono text-xs">
                                        {profile.matrix_size}
                                    </Badge>
                                )}
                            </div>

                            {/* Cold-start notice */}
                            {profile.mode === 'COLD-START' && (
                                <div className="flex items-start gap-3 p-4 bg-amber-50 border border-amber-200 rounded-xl text-sm text-amber-800">
                                    <AlertCircle className="h-5 w-5 text-amber-500 shrink-0 mt-0.5" />
                                    <div>
                                        <p className="font-semibold">Chưa đủ dữ liệu hành vi</p>
                                        <p className="text-amber-700 mt-0.5">
                                            User này chưa tương tác với sản phẩm nào. Hệ thống tự động trả về danh sách sản phẩm phổ biến nhất (Popular Items Fallback).
                                        </p>
                                    </div>
                                </div>
                            )}

                            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">

                                {/* Left: Behavior history */}
                                <div className="space-y-3">
                                    <h3 className="font-bold text-slate-700 flex items-center gap-2 text-sm">
                                        <Activity className="h-4 w-4 text-slate-400" />
                                        Lịch sử tương tác
                                        <Badge variant="secondary" className="ml-auto">
                                            {profile.hanh_vi_history.length} sản phẩm
                                        </Badge>
                                    </h3>
                                    <div className="space-y-2 max-h-96 overflow-y-auto pr-1">
                                        {profile.hanh_vi_history.length === 0 ? (
                                            <p className="text-sm text-slate-400 py-4 text-center">Không có hành vi</p>
                                        ) : (
                                            profile.hanh_vi_history.map((item: any) => (
                                                <div key={item.san_pham_id}
                                                    className="flex items-center gap-3 p-3 bg-white rounded-xl border border-slate-100 hover:border-slate-200 transition-colors">
                                                    {item.hinh_anh ? (
                                                        <Image
                                                            src={item.hinh_anh} alt={item.ten_san_pham}
                                                            width={40} height={40}
                                                            className="rounded-lg object-cover shrink-0 border border-slate-100"
                                                        />
                                                    ) : (
                                                        <div className="h-10 w-10 rounded-lg bg-slate-100 shrink-0 flex items-center justify-center">
                                                            <ShoppingBag className="h-4 w-4 text-slate-300" />
                                                        </div>
                                                    )}
                                                    <div className="flex-1 min-w-0">
                                                        <p className="text-sm font-medium text-slate-800 truncate">{item.ten_san_pham}</p>
                                                        <p className="text-xs text-slate-500">{item.hanh_vi_label}</p>
                                                    </div>
                                                    <div className="text-right shrink-0">
                                                        <span className="text-sm font-bold text-indigo-600">{item.diem_tuong_tac}</span>
                                                        <p className="text-[10px] text-slate-400">điểm</p>
                                                    </div>
                                                </div>
                                            ))
                                        )}
                                    </div>
                                </div>

                                {/* Right: Top predicted scores */}
                                <div className="space-y-3">
                                    <h3 className="font-bold text-slate-700 flex items-center gap-2 text-sm">
                                        <TrendingUp className="h-4 w-4 text-slate-400" />
                                        Điểm Cosine dự báo (Top 10)
                                        <Badge variant="secondary" className="ml-auto bg-violet-50 text-violet-700 border-none">
                                            Chưa tương tác
                                        </Badge>
                                    </h3>
                                    <div className="space-y-2 max-h-96 overflow-y-auto pr-1">
                                        {profile.top10_scores.length === 0 ? (
                                            <p className="text-sm text-slate-400 py-4 text-center">Không có dữ liệu</p>
                                        ) : (
                                            profile.top10_scores.map((item: any, idx: number) => {
                                                const maxScore = profile.top10_scores[0]?.diem_du_bao ?? 1;
                                                return (
                                                    <div key={item.san_pham_id}
                                                        className={`flex items-center gap-3 p-3 rounded-xl border transition-colors ${
                                                            idx < 8
                                                                ? 'bg-emerald-50/60 border-emerald-100'
                                                                : 'bg-white border-slate-100'
                                                        }`}>
                                                        <span className="text-xs font-bold text-slate-400 w-5 shrink-0 text-right">
                                                            {idx + 1}
                                                        </span>
                                                        {item.hinh_anh ? (
                                                            <Image
                                                                src={item.hinh_anh} alt={item.ten_san_pham}
                                                                width={36} height={36}
                                                                className="rounded-lg object-cover shrink-0 border border-slate-100"
                                                            />
                                                        ) : (
                                                            <div className="h-9 w-9 rounded-lg bg-slate-100 shrink-0 flex items-center justify-center">
                                                                <ShoppingBag className="h-3.5 w-3.5 text-slate-300" />
                                                            </div>
                                                        )}
                                                        <div className="flex-1 min-w-0 space-y-1">
                                                            <p className="text-sm font-medium text-slate-800 truncate">{item.ten_san_pham}</p>
                                                            <div className="flex items-center gap-2">
                                                                <ScoreBar score={item.diem_du_bao} max={maxScore} color="bg-violet-400" />
                                                                <span className="text-xs font-bold text-violet-600 shrink-0 w-12 text-right">
                                                                    {item.diem_du_bao.toFixed(3)}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        {idx < 8 && (
                                                            <Badge className="bg-emerald-100 text-emerald-700 border-none text-[10px] shrink-0 px-1.5">
                                                                Gợi ý
                                                            </Badge>
                                                        )}
                                                    </div>
                                                );
                                            })
                                        )}
                                    </div>
                                </div>
                            </div>

                            {/* Final recommendations */}
                            <div className="space-y-3">
                                <h3 className="font-bold text-slate-700 flex items-center gap-2 text-sm">
                                    <Sparkles className="h-4 w-4 text-emerald-500" />
                                    Sản phẩm được gợi ý trên giao diện
                                    <Badge className="ml-auto bg-emerald-100 text-emerald-700 border-none font-bold">
                                        Top {profile.goi_y.length}
                                    </Badge>
                                </h3>
                                <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                    {profile.goi_y.map((sp: any, idx: number) => (
                                        <Link
                                            key={sp.id}
                                            href={`/products/${sp.duong_dan}`}
                                            target="_blank"
                                            className="group rounded-xl border border-slate-200 bg-white overflow-hidden hover:shadow-md hover:border-emerald-200 transition-all"
                                        >
                                            <div className="aspect-square bg-slate-50 relative overflow-hidden">
                                                {sp.anh_chinh?.duong_dan_anh ? (
                                                    <Image
                                                        src={sp.anh_chinh.duong_dan_anh}
                                                        alt={sp.ten_san_pham}
                                                        fill className="object-cover group-hover:scale-105 transition-transform"
                                                    />
                                                ) : (
                                                    <div className="absolute inset-0 flex items-center justify-center">
                                                        <ShoppingBag className="h-8 w-8 text-slate-200" />
                                                    </div>
                                                )}
                                                <span className="absolute top-2 left-2 h-5 w-5 rounded-full bg-emerald-500 text-white text-[10px] font-bold flex items-center justify-center shadow">
                                                    {idx + 1}
                                                </span>
                                            </div>
                                            <div className="p-2">
                                                <p className="text-xs font-medium text-slate-700 line-clamp-2 leading-tight">
                                                    {sp.ten_san_pham}
                                                </p>
                                                <p className="text-xs font-bold text-emerald-600 mt-1">
                                                    {(sp.gia_khuyen_mai || sp.gia_goc)?.toLocaleString('vi-VN')}đ
                                                </p>
                                            </div>
                                        </Link>
                                    ))}
                                </div>
                            </div>
                        </div>
                    )}
                </CardContent>
            </Card>

            {/* ── Top active users ── */}
            <Card className="border-slate-200/60 shadow-sm">
                <CardHeader className="pb-3">
                    <CardTitle className="text-base font-bold text-slate-800 flex items-center gap-2">
                        <Users className="h-4 w-4 text-indigo-500" />
                        Top khách hàng hoạt động nhiều nhất
                    </CardTitle>
                </CardHeader>
                <CardContent>
                    <div className="space-y-2">
                        {topUsers.slice(0, 8).map((row: any, idx: number) => (
                            <div
                                key={row.user?.id}
                                className="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 cursor-pointer transition-colors group"
                                onClick={() => row.user?.id && setSelectedUserId(row.user.id)}
                            >
                                <span className="text-sm font-bold text-slate-300 w-5 shrink-0">{idx + 1}</span>
                                <div className="h-9 w-9 rounded-full bg-indigo-100 flex items-center justify-center shrink-0 text-indigo-600 font-bold text-sm">
                                    {row.user?.ho_va_ten?.[0] ?? '?'}
                                </div>
                                <div className="flex-1 min-w-0">
                                    <p className="text-sm font-semibold text-slate-800 truncate">{row.user?.ho_va_ten}</p>
                                    <p className="text-xs text-slate-400 truncate">{row.user?.email}</p>
                                </div>
                                <div className="flex items-center gap-2 shrink-0">
                                    {row.mua > 0 && (
                                        <Badge className="bg-emerald-100 text-emerald-700 border-none text-xs">
                                            <ShoppingBag className="h-3 w-3 mr-1" />{row.mua}
                                        </Badge>
                                    )}
                                    {row.yeu_thich > 0 && (
                                        <Badge className="bg-rose-100 text-rose-600 border-none text-xs">
                                            <Heart className="h-3 w-3 mr-1" />{row.yeu_thich}
                                        </Badge>
                                    )}
                                    <Badge variant="outline" className="text-xs font-bold">
                                        {row.tong_hv} HV
                                    </Badge>
                                    <ArrowRight className="h-4 w-4 text-slate-300 group-hover:text-indigo-500 group-hover:translate-x-1 transition-all" />
                                </div>
                            </div>
                        ))}
                    </div>
                </CardContent>
            </Card>

        </div>
    );
}
