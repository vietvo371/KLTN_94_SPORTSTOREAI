'use client';

import * as React from "react";
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import {
    Users,
    ShoppingCart,
    Package,
    DollarSign,
    TrendingUp,
    TrendingDown,
    Activity,
    Target,
    Zap,
    Crown,
    LayoutDashboard,
    CalendarDays,
    Trophy
} from "lucide-react";

import { useAdminReportsOverview, useAdminReportsChart, useAdminReportsTopProducts, ReportPeriod } from "@/hooks/useAdminReports";
import { formatCurrency } from "@/lib/utils";
import { Loader2 } from "lucide-react";
import {
    AreaChart,
    Area,
    XAxis,
    YAxis,
    CartesianGrid,
    ResponsiveContainer,
    Tooltip as RechartsTooltip
} from 'recharts';

import {
    ChartConfig,
    ChartContainer,
    ChartTooltip,
    ChartTooltipContent,
} from "@/components/ui/chart";

const chartConfig = {
    revenue: {
        label: "Doanh thu",
        color: "hsl(var(--primary))",
    },
} satisfies ChartConfig;

export default function ReportsDashboard() {
    const [period, setPeriod] = React.useState<ReportPeriod>('month');

    const { data: overview, isLoading: isOverviewLoading, isError: isOverviewError } = useAdminReportsOverview(period);
    const { data: chartData, isLoading: isChartLoading } = useAdminReportsChart(period);
    const { data: topProducts, isLoading: isTopProdLoading } = useAdminReportsTopProducts(5);

    const isLoading = isOverviewLoading || isChartLoading || isTopProdLoading;

    if (isLoading) {
        return (
            <div className="flex flex-col items-center justify-center h-[600px] gap-4">
                <div className="relative">
                    <Loader2 className="h-12 w-12 animate-spin text-primary/20" />
                    <Activity className="h-6 w-6 text-primary absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" />
                </div>
                <p className="text-slate-400 font-black uppercase tracking-widest text-[10px] animate-pulse">Đang đồng bộ dữ liệu hệ thống...</p>
            </div>
        );
    }

    if (isOverviewError || !overview) {
        return (
            <div className="p-12 text-center bg-rose-50/50 text-rose-600 rounded-[2.5rem] border border-rose-100 border-dashed m-8">
                <div className="h-12 w-12 rounded-2xl bg-rose-100 flex items-center justify-center mx-auto mb-4 text-rose-500">
                    <Activity className="h-6 w-6" />
                </div>
                <h3 className="text-lg font-black uppercase italic tracking-tight">Mất kết nối dữ liệu</h3>
                <p className="text-sm font-medium opacity-70 mt-1">Lỗi khi tải dữ liệu thống kê. Vui lòng kiểm tra lại backend.</p>
            </div>
        );
    }

    const formatGrowth = (growth: number) => {
        const isPositive = growth >= 0;
        return (
            <div className={`flex items-center gap-1.5 text-[10px] font-black px-2.5 py-1 rounded-lg border ${isPositive ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : 'bg-rose-500/10 text-rose-500 border-rose-500/20'
                }`}>
                {isPositive ? <TrendingUp className="h-3 w-3" /> : <TrendingDown className="h-3 w-3" />}
                <span>{growth > 0 ? '+' : ''}{growth}%</span>
            </div>
        );
    };

    const statItems = [
        {
            name: 'Tổng Doanh Thu',
            value: formatCurrency(overview.revenue.value),
            icon: DollarSign,
            color: 'text-emerald-500',
            bg: 'bg-emerald-500/10',
            border: 'border-emerald-500/20',
            growth: overview.revenue.growth,
            description: 'Đơn hàng đã giao thành công'
        },
        {
            name: 'Tổng Đơn Hàng',
            value: overview.orders.value.toLocaleString(),
            icon: ShoppingCart,
            color: 'text-blue-500',
            bg: 'bg-blue-500/10',
            border: 'border-blue-500/20',
            growth: overview.orders.growth,
            description: 'Phát sinh trong kỳ'
        },
        {
            name: 'Sản Phẩm Đã Bán',
            value: overview.products_sold.value.toLocaleString(),
            icon: Package,
            color: 'text-amber-500',
            bg: 'bg-amber-500/10',
            border: 'border-amber-500/20',
            growth: overview.products_sold.growth,
            description: 'Lượt mua sản phẩm hoàn tất'
        },
        {
            name: 'Khách Hàng Mới',
            value: overview.customers.value.toLocaleString(),
            icon: Users,
            color: 'text-violet-500',
            bg: 'bg-violet-500/10',
            border: 'border-violet-500/20',
            growth: overview.customers.growth,
            description: 'Đăng ký tài khoản mới'
        },
    ];

    return (
        <div className="p-8 space-y-10 animate-in fade-in slide-in-from-bottom-4 duration-1000">
            {/* Elegant Header with Filters */}
            <div className="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-2">
                <div className="space-y-2">
                    <div className="flex items-center gap-3">
                        <div className="p-3 bg-slate-900 rounded-2xl shadow-xl shadow-slate-200">
                            <Zap className="h-6 w-6 text-primary fill-primary" />
                        </div>
                        <h1 className="text-4xl font-black text-slate-900 tracking-tighter uppercase italic">
                            ANALYTICS <span className="text-primary not-italic">HUB</span>
                        </h1>
                    </div>
                    <p className="text-slate-500 font-medium flex items-center gap-2 ml-1">
                        <Target className="h-4 w-4 text-slate-300" />
                        Trung tâm báo cáo và thống kê chuyên sâu
                    </p>
                </div>
                <div className="flex items-center gap-4">
                    <div className="flex items-center gap-4 bg-white/60 backdrop-blur-xl p-2 rounded-[1.5rem] border border-white shadow-xl shadow-slate-200/40 ring-1 ring-slate-100">
                        <div className="pl-4">
                            <CalendarDays className="h-5 w-5 text-slate-400" />
                        </div>
                        <Select value={period} onValueChange={(val: ReportPeriod) => setPeriod(val)}>
                            <SelectTrigger className="w-[180px] bg-transparent border-none shadow-none font-black text-slate-900 uppercase tracking-widest focus:ring-0">
                                <SelectValue placeholder="Chọn kỳ báo cáo" />
                            </SelectTrigger>
                            <SelectContent className="rounded-2xl border-none shadow-2xl font-bold">
                                <SelectItem value="today">Hôm nay</SelectItem>
                                <SelectItem value="week">Tuần này</SelectItem>
                                <SelectItem value="month">Tháng này</SelectItem>
                                <SelectItem value="year">Năm nay</SelectItem>
                            </SelectContent>
                        </Select>
                    </div>
                </div>
            </div>

            {/* Premium Stats Grid */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {statItems.map((stat) => (
                    <Card key={stat.name} className="border-none shadow-2xl shadow-slate-200/50 hover:shadow-primary/10 transition-all duration-500 group overflow-hidden bg-white/80 backdrop-blur-md ring-1 ring-white relative">
                        <div className={`absolute top-0 right-0 w-32 h-32 ${stat.bg} rounded-full blur-3xl -mr-16 -mt-16 opacity-50 group-hover:opacity-100 transition-opacity`} />
                        <CardHeader className="flex flex-row items-center justify-between pb-2 relative z-10">
                            <CardTitle className="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em]">{stat.name}</CardTitle>
                            <div className={`${stat.bg} ${stat.border} border p-3 rounded-2xl group-hover:scale-110 active:scale-95 transition-all duration-300 shadow-sm shadow-slate-100`}>
                                <stat.icon className={`h-5 w-5 ${stat.color}`} />
                            </div>
                        </CardHeader>
                        <CardContent className="relative z-10">
                            <div className="text-3xl font-black text-slate-900 tracking-tight">{stat.value}</div>
                            <div className="flex items-center justify-between mt-4">
                                {formatGrowth(stat.growth)}
                                <span className="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">{stat.description}</span>
                            </div>
                        </CardContent>
                    </Card>
                ))}
            </div>

            {/* Main Insights Section */}
            <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {/* Advanced Revenue Chart */}
                <Card className="lg:col-span-2 border-none shadow-2xl shadow-slate-200/50 bg-white/80 backdrop-blur-md ring-1 ring-white overflow-hidden rounded-[2.5rem]">
                    <CardHeader className="p-8 pb-0">
                        <div className="flex items-start justify-between">
                            <div className="space-y-1">
                                <CardTitle className="text-2xl font-black text-slate-900 uppercase italic tracking-tight">Biểu đồ Doanh Thu</CardTitle>
                                <CardDescription className="text-slate-400 font-bold uppercase text-[10px] tracking-[0.1em]">Theo {period === 'year' ? 'tháng' : 'ngày'} trong kỳ thống kê</CardDescription>
                            </div>
                            <div className="h-10 w-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-300">
                                <Activity className="h-5 w-5 text-primary" />
                            </div>
                        </div>
                    </CardHeader>
                    <CardContent className="p-8 pt-6 h-[400px]">
                        {chartData && chartData.length > 0 ? (
                            <ChartContainer config={chartConfig} className="h-full w-full">
                                <AreaChart data={chartData} margin={{ top: 20, right: 30, left: 10, bottom: 0 }}>
                                    <defs>
                                        <linearGradient id="colorRevenue" x1="0" y1="0" x2="0" y2="1">
                                            <stop offset="5%" stopColor="hsl(var(--primary))" stopOpacity={0.3} />
                                            <stop offset="95%" stopColor="hsl(var(--primary))" stopOpacity={0} />
                                        </linearGradient>
                                    </defs>
                                    <CartesianGrid strokeDasharray="3 3" vertical={false} stroke="hsl(var(--muted-foreground))" strokeOpacity={0.1} />
                                    <XAxis
                                        dataKey="date"
                                        axisLine={false}
                                        tickLine={false}
                                        tick={{ fontSize: 10, fontWeight: 800, fill: '#94a3b8' }}
                                        dy={15}
                                    />
                                    <YAxis
                                        axisLine={false}
                                        tickLine={false}
                                        tick={{ fontSize: 10, fontWeight: 800, fill: '#94a3b8' }}
                                        tickFormatter={(value) => `${value / 1000000}M`}
                                    />
                                    <ChartTooltip
                                        cursor={{ stroke: 'hsl(var(--primary))', strokeWidth: 2, strokeDasharray: '4 4' }}
                                        content={<ChartTooltipContent hideLabel indicator="line" />}
                                    />
                                    <Area
                                        type="monotone"
                                        dataKey="revenue"
                                        stroke="hsl(var(--primary))"
                                        strokeWidth={4}
                                        fillOpacity={1}
                                        fill="url(#colorRevenue)"
                                        animationDuration={1500}
                                    />
                                </AreaChart>
                            </ChartContainer>
                        ) : (
                            <div className="h-full w-full flex flex-col items-center justify-center text-slate-300 gap-3">
                                <Activity className="h-10 w-10 opacity-20" />
                                <p className="text-[11px] font-black uppercase tracking-[0.2em] italic">Chưa có dữ liệu doanh thu</p>
                            </div>
                        )}
                    </CardContent>
                </Card>

                {/* Top Products - Leaderboard Style */}
                <Card className="border-none shadow-2xl shadow-slate-200/50 bg-white/80 backdrop-blur-md ring-1 ring-white overflow-hidden rounded-[2.5rem] flex flex-col">
                    <CardHeader className="p-8 border-b border-slate-50">
                        <div className="flex items-center justify-between">
                            <div className="space-y-1">
                                <CardTitle className="text-xl font-black text-slate-900 uppercase italic tracking-tight">Sản phẩm nổi bật</CardTitle>
                                <CardDescription className="text-slate-400 font-bold uppercase text-[10px] tracking-[0.1em]">Top 5 sản phẩm bán chạy nhất</CardDescription>
                            </div>
                            <div className="h-12 w-12 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-500 shadow-sm shadow-amber-200/50">
                                <Crown className="h-6 w-6" />
                            </div>
                        </div>
                    </CardHeader>
                    <CardContent className="p-0 flex-1">
                        <div className="divide-y divide-slate-50">
                            {topProducts && topProducts.length > 0 ? topProducts.map((product: any, index: number) => (
                                <div key={product.id} className="flex items-center gap-4 p-5 hover:bg-slate-50/80 transition-all group relative overflow-hidden">
                                    {index === 0 && <div className="absolute left-0 top-0 bottom-0 w-1 bg-amber-400" />}

                                    <div className="relative">
                                        <div className="h-12 w-12 rounded-xl bg-slate-100 overflow-hidden shadow-sm">
                                            {product.image ? (
                                                <img src={product.image} alt={product.ten_san_pham} className="h-full w-full object-cover" />
                                            ) : (
                                                <div className="h-full w-full flex items-center justify-center text-slate-400"><Package className="h-5 w-5" /></div>
                                            )}
                                        </div>
                                        <div className={`absolute -top-2 -right-2 h-6 w-6 rounded-full flex items-center justify-center font-black text-[10px] shadow-sm border-2 border-white ${index === 0 ? 'bg-amber-500 text-white' :
                                            index === 1 ? 'bg-slate-300 text-slate-700' :
                                                index === 2 ? 'bg-orange-300 text-orange-800' :
                                                    'bg-slate-100 text-slate-400'
                                            }`}>
                                            {index === 0 ? <Trophy className="h-3 w-3" /> : index + 1}
                                        </div>
                                    </div>

                                    <div className="flex-1 min-w-0">
                                        <p className="text-sm font-black text-slate-900 line-clamp-1 truncate tracking-tight group-hover:text-primary transition-colors">{product.ten_san_pham}</p>
                                        <div className="flex items-center gap-2 mt-1">
                                            <span className="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-100 px-2 py-0.5 rounded-md">ID: {product.id}</span>
                                        </div>
                                    </div>
                                    <div className="text-right shrink-0">
                                        <p className="text-base font-black text-emerald-600 leading-none">{formatCurrency(product.total_revenue)}</p>
                                        <p className="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Đã bán: <span className="text-slate-900">{product.total_sold}</span></p>
                                    </div>
                                </div>
                            )) : (
                                <div className="h-[300px] flex flex-col items-center justify-center text-slate-300 gap-3">
                                    <Activity className="h-10 w-10 opacity-20" />
                                    <p className="text-[11px] font-black uppercase tracking-[0.2em] italic">Chưa phát hiện hoạt động bán hàng</p>
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>
    );
}
