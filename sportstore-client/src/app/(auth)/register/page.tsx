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

export default function RegisterPage() {
    const router = useRouter();
    const setAuth = useAuthStore((state) => state.setAuth);

    const [hoTen, setHoTen] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [passwordConfirm, setPasswordConfirm] = useState('');
    const [errorMsg, setErrorMsg] = useState('');

    const registerMutation = useMutation({
        mutationFn: () => authService.register({ ho_ten: hoTen, email, password, password_confirmation: passwordConfirm }),
        onSuccess: (data) => {
            setAuth(data.user, data.token);
            router.push('/');
        },
        onError: (error: any) => {
            setErrorMsg(error?.message || 'Đăng ký thất bại. Vui lòng thử lại.');
        },
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        setErrorMsg('');
        if (password !== passwordConfirm) {
            setErrorMsg('Mật khẩu xác nhận không khớp.');
            return;
        }
        registerMutation.mutate();
    };

    return (
        <div className="flex min-h-[80vh] items-center justify-center px-4 py-12">
            <Card className="w-full max-w-md shadow-lg border-0 bg-white/50 backdrop-blur-sm">
                <CardHeader className="space-y-2 text-center">
                    <CardTitle className="text-3xl font-bold tracking-tight">Tạo Tài Khoản Mới</CardTitle>
                    <CardDescription>
                        Đăng ký để nhận thông báo khuyến mãi và quản lý đơn hàng
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
                            <label className="text-sm font-medium leading-none" htmlFor="hoTen">
                                Họ và Tên
                            </label>
                            <Input
                                id="hoTen"
                                type="text"
                                placeholder="Nguyễn Văn A"
                                required
                                value={hoTen}
                                onChange={(e) => setHoTen(e.target.value)}
                            />
                        </div>

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
                            <label className="text-sm font-medium leading-none" htmlFor="password">
                                Mật khẩu
                            </label>
                            <Input
                                id="password"
                                type="password"
                                required
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                            />
                        </div>

                        <div className="space-y-2">
                            <label className="text-sm font-medium leading-none" htmlFor="passwordConfirm">
                                Xác nhận mật khẩu
                            </label>
                            <Input
                                id="passwordConfirm"
                                type="password"
                                required
                                value={passwordConfirm}
                                onChange={(e) => setPasswordConfirm(e.target.value)}
                            />
                        </div>
                    </CardContent>

                    <CardFooter className="flex flex-col gap-4">
                        <Button
                            type="submit"
                            className="w-full h-12 text-md"
                            disabled={registerMutation.isPending}
                        >
                            {registerMutation.isPending ? 'Đang tạo tài khoản...' : 'Đăng Ký'}
                        </Button>

                        <div className="text-center text-sm">
                            Bạn đã có tài khoản?{' '}
                            <Link href="/login" className="text-primary hover:underline font-medium">
                                Đăng nhập ngay
                            </Link>
                        </div>
                    </CardFooter>
                </form>
            </Card>
        </div>
    );
}
