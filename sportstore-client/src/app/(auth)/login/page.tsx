'use client';

import { useState } from 'react';
import { useMutation } from '@tanstack/react-query';
import { useRouter } from 'next/navigation';
import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Card, CardHeader, CardContent, CardFooter, CardTitle, CardDescription } from '@/components/ui/card';
import { authService } from '@/services/auth.service';
import { useAuthStore } from '@/store/auth.store';

export default function LoginPage() {
    const router = useRouter();
    const setAuth = useAuthStore((state) => state.setAuth);

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [errorMsg, setErrorMsg] = useState('');

    const loginMutation = useMutation({
        mutationFn: () => authService.login({ email, password }),
        onSuccess: (data) => {
            setAuth(data.user, data.token);
            router.push('/');
        },
        onError: (error: any) => {
            setErrorMsg(error?.message || 'Email hoặc mật khẩu không chính xác.');
        },
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        setErrorMsg('');
        loginMutation.mutate();
    };

    return (
        <div className="flex min-h-[80vh] items-center justify-center px-4 py-12">
            <Card className="w-full max-w-md shadow-lg border-0 bg-white/50 backdrop-blur-sm">
                <CardHeader className="space-y-2 text-center">
                    <CardTitle className="text-3xl font-bold tracking-tight">Chào Mừng Trở Lại</CardTitle>
                    <CardDescription>
                        Đăng nhập để xem giỏ hàng và thanh toán nhanh chóng
                    </CardDescription>
                </CardHeader>

                <form onSubmit={handleSubmit}>
                    <CardContent className="space-y-4">
                        {errorMsg && (
                            <div className="p-3 text-sm text-destructive bg-destructive/10 rounded-md">
                                {errorMsg}
                            </div>
                        )}

                        <div className="space-y-2">
                            <label className="text-sm font-medium leading-none" htmlFor="email">
                                Email
                            </label>
                            <Input
                                id="email"
                                type="email"
                                placeholder="m@example.com"
                                required
                                value={email}
                                onChange={(e) => setEmail(e.target.value)}
                            />
                        </div>

                        <div className="space-y-2">
                            <div className="flex items-center justify-between">
                                <label className="text-sm font-medium leading-none" htmlFor="password">
                                    Mật khẩu
                                </label>
                                <Link href="#" className="text-sm text-primary hover:underline">
                                    Quên mật khẩu?
                                </Link>
                            </div>
                            <Input
                                id="password"
                                type="password"
                                required
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                            />
                        </div>
                    </CardContent>

                    <CardFooter className="flex flex-col gap-4">
                        <Button
                            type="submit"
                            className="w-full h-12 text-md"
                            disabled={loginMutation.isPending}
                        >
                            {loginMutation.isPending ? 'Đang đăng nhập...' : 'Đăng Nhập'}
                        </Button>

                        <div className="text-center text-sm">
                            Bạn chưa có tài khoản?{' '}
                            <Link href="/register" className="text-primary hover:underline font-medium">
                                Đăng ký ngay
                            </Link>
                        </div>
                    </CardFooter>
                </form>
            </Card>
        </div>
    );
}
