'use client';

import Link from 'next/link';
import { ShoppingCart, User, Search, Menu, LogOut } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { useCartStore } from '@/store/cart.store';
import { useAuthStore } from '@/store/auth.store';

export function Header() {
    const { itemCount, openCart } = useCartStore();
    const { isAuthenticated, user, logout } = useAuthStore();

    return (
        <header className="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
            <div className="container mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex h-16 items-center justify-between">
                    {/* Mobile Menu Button */}
                    <div className="flex items-center md:hidden">
                        <Button variant="ghost" size="icon" className="mr-2">
                            <Menu className="h-5 w-5" />
                            <span className="sr-only">Toggle Menu</span>
                        </Button>
                    </div>

                    {/* Logo */}
                    <div className="flex justify-center md:justify-start">
                        <Link href="/" className="flex items-center gap-2">
                            <span className="text-xl font-bold tracking-tighter sm:text-2xl text-primary">
                                SPORTSTORE
                            </span>
                        </Link>
                    </div>

                    {/* Desktop Navigation */}
                    <nav className="hidden md:flex items-center gap-6 text-sm font-medium">
                        <Link href="/products" className="transition-colors hover:text-primary">
                            Giày bóng đá
                        </Link>
                        <Link href="/products?category=ao-quan" className="transition-colors hover:text-primary">
                            Quần áo
                        </Link>
                        <Link href="/products?category=phu-kien" className="transition-colors hover:text-primary">
                            Phụ kiện
                        </Link>
                        <Link href="/#brands" className="transition-colors hover:text-primary">
                            Thương hiệu
                        </Link>
                    </nav>

                    {/* Right Actions */}
                    <div className="flex items-center gap-2 sm:gap-4">
                        <Button variant="ghost" size="icon" className="hidden sm:flex" aria-label="Tìm kiếm">
                            <Search className="h-5 w-5" />
                        </Button>

                        {isAuthenticated ? (
                            <div className="flex items-center justify-center gap-2">
                                <span className="hidden md:inline-block text-sm font-medium pr-2 border-r">
                                    {user?.ho_ten || 'User'}
                                </span>
                                <Button variant="ghost" size="icon" onClick={logout} title="Đăng xuất">
                                    <LogOut className="h-5 w-5" />
                                </Button>
                            </div>
                        ) : (
                            <Link href="/login">
                                <Button variant="ghost" size="icon" aria-label="Tài khoản">
                                    <User className="h-5 w-5" />
                                </Button>
                            </Link>
                        )}

                        <Button
                            variant="ghost"
                            size="icon"
                            aria-label="Giỏ hàng"
                            className="relative"
                            onClick={openCart}
                        >
                            <ShoppingCart className="h-5 w-5" />
                            {itemCount > 0 && (
                                <span className="absolute top-1 right-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary text-[10px] font-bold text-primary-foreground">
                                    {itemCount}
                                </span>
                            )}
                        </Button>
                    </div>
                </div>
            </div>
        </header>
    );
}
