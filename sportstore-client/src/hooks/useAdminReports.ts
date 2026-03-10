import { useQuery } from '@tanstack/react-query';
import apiClient from '@/lib/api';

export interface OverviewData {
    revenue: { value: number; growth: number };
    orders: { value: number; growth: number };
    customers: { value: number; growth: number };
    products_sold: { value: number; growth: number };
}

export interface ChartData {
    date: string;
    revenue: number;
}

export interface TopProductData {
    id: number;
    ten_san_pham: string;
    gia_goc: string;
    gia_khuyen_mai: string | null;
    image: string | null;
    total_sold: string;
    total_revenue: string;
}

export type ReportPeriod = 'today' | 'week' | 'month' | 'year';

export function useAdminReportsOverview(period: ReportPeriod = 'month') {
    return useQuery({
        queryKey: ['admin-reports-overview', period],
        queryFn: async () => {
            const response = await apiClient.get<any, { success: boolean; data: OverviewData }>(`/admin/reports/overview?period=${period}`);
            if (!response.success) throw new Error("Failed to fetch overview");
            return response.data;
        },
    });
}

export function useAdminReportsChart(period: ReportPeriod = 'month') {
    return useQuery({
        queryKey: ['admin-reports-chart', period],
        queryFn: async () => {
            const response = await apiClient.get<any, { success: boolean; data: ChartData[] }>(`/admin/reports/revenue-chart?period=${period}`);
            if (!response.success) throw new Error("Failed to fetch chart data");
            return response.data;
        },
    });
}

export function useAdminReportsTopProducts(limit: number = 5) {
    return useQuery({
        queryKey: ['admin-reports-top-products', limit],
        queryFn: async () => {
            const response = await apiClient.get<any, { success: boolean; data: TopProductData[] }>(`/admin/reports/top-products?limit=${limit}`);
            if (!response.success) throw new Error("Failed to fetch top products");
            return response.data;
        },
    });
}
