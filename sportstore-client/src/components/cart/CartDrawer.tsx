'use client';

import { useCartStore } from '@/store/cart.store';
import {
    Sheet,
    SheetContent,
    SheetHeader,
    SheetTitle,
} from '@/components/ui/sheet';
import { ShoppingCart } from 'lucide-react';
import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { useEffect, useState } from 'react';

export function CartDrawer() {
    const { isOpen, closeCart, itemCount } = useCartStore();

    // Hydration fix for Zustand
    const [isMounted, setIsMounted] = useState(false);
    useEffect(() => setIsMounted(true), []);

    if (!isMounted) return null;

    return (
        <Sheet open={isOpen} onOpenChange={closeCart}>
            <SheetContent className="flex flex-col w-full sm:max-w-md">
                <SheetHeader>
                    <SheetTitle className="flex items-center gap-2">
                        <ShoppingCart className="h-5 w-5" />
                        Giỏ hàng của bạn ({itemCount})
                    </SheetTitle>
                </SheetHeader>

                <div className="flex-1 overflow-y-auto py-6">
                    {itemCount === 0 ? (
                        <div className="flex flex-col items-center justify-center h-full text-center space-y-4">
                            <div className="bg-slate-100 p-6 rounded-full text-slate-400">
                                <ShoppingCart className="h-12 w-12" />
                            </div>
                            <p className="text-muted-foreground font-medium">Giỏ hàng đang trống</p>
                            <Button onClick={closeCart} variant="outline" className="mt-4">
                                Tiếp tục mua sắm
                            </Button>
                        </div>
                    ) : (
                        <div className="space-y-4">
                            {/* Items would map here later when cart data is added */}
                            <div className="text-sm text-center text-muted-foreground p-4 bg-slate-50 rounded-lg">
                                Cart Items Placeholder...
                            </div>
                        </div>
                    )}
                </div>

                {itemCount > 0 && (
                    <div className="border-t pt-4 space-y-4">
                        <div className="flex justify-between font-semibold">
                            <span>Tổng cộng:</span>
                            <span className="text-primary">0 ₫</span>
                        </div>
                        <Link href="/checkout" onClick={closeCart}>
                            <Button className="w-full">Thanh Toán</Button>
                        </Link>
                    </div>
                )}
            </SheetContent>
        </Sheet>
    );
}
