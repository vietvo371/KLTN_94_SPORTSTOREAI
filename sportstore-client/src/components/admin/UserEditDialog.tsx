'use client';

import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import * as z from "zod";
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogHeader,
    DialogTitle,
    DialogFooter,
} from "@/components/ui/dialog";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from "@/components/ui/form";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { Switch } from "@/components/ui/switch";
import { Button } from "@/components/ui/button";
import { useUpdateUser } from "@/hooks/useAdminUsers";
import { Loader2, ShieldCheck, UserCog, Ban, CheckCircle2 } from "lucide-react";
import { useEffect } from "react";

const userSchema = z.object({
    vai_tro: z.enum(["khach_hang", "quan_tri"]),
    trang_thai: z.boolean(),
});

interface UserEditDialogProps {
    open: boolean;
    onOpenChange: (open: boolean) => void;
    user: any;
}

export function UserEditDialog({ open, onOpenChange, user }: UserEditDialogProps) {
    const updateUser = useUpdateUser();

    const form = useForm<z.infer<typeof userSchema>>({
        resolver: zodResolver(userSchema),
        defaultValues: {
            vai_tro: "khach_hang",
            trang_thai: true,
        },
    });

    useEffect(() => {
        if (user && open) {
            form.reset({
                vai_tro: user.vai_tro,
                trang_thai: user.trang_thai,
            });
        }
    }, [user, open, form]);

    const onSubmit = async (values: z.infer<typeof userSchema>) => {
        await updateUser.mutateAsync({ id: user.id, data: values });
        onOpenChange(false);
    };

    return (
        <Dialog open={open} onOpenChange={onOpenChange}>
            <DialogContent className="sm:max-w-[425px]">
                <DialogHeader>
                    <DialogTitle>Thiết lập tài khoản</DialogTitle>
                    <DialogDescription>
                        Chỉnh sửa quyền hạn và trạng thái hoạt động của người dùng
                    </DialogDescription>
                </DialogHeader>

                <div className="p-8">
                    <Form {...form}>
                        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
                            <div className="space-y-6">
                                <div className="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <div className="h-10 w-10 rounded-full bg-white flex items-center justify-center border border-slate-200 shadow-sm overflow-hidden">
                                        {user?.anh_dai_dien ? (
                                            <img src={user.anh_dai_dien} alt={user.ho_va_ten} className="h-full w-full object-cover" />
                                        ) : (
                                            <span className="font-black text-slate-400 text-xs">{user?.ho_va_ten?.charAt(0)}</span>
                                        )}
                                    </div>
                                    <div className="flex flex-col">
                                        <span className="font-black text-slate-900 text-sm leading-none">{user?.ho_va_ten}</span>
                                        <span className="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-wider">{user?.email}</span>
                                    </div>
                                </div>

                                <FormField
                                    control={form.control}
                                    name="vai_tro"
                                    render={({ field }) => (
                                        <FormItem>
                                            <FormLabel>Vai trò hệ thống</FormLabel>
                                            <Select onValueChange={field.onChange} defaultValue={field.value} value={field.value}>
                                                <FormControl>
                                                    <SelectTrigger>
                                                        <SelectValue placeholder="Chọn vai trò" />
                                                    </SelectTrigger>
                                                </FormControl>
                                                <SelectContent>
                                                    <SelectItem value="khach_hang">Không cấp quyền admin</SelectItem>
                                                    <SelectItem value="quan_tri">Cấp quyền admin</SelectItem>
                                                </SelectContent>
                                            </Select>
                                            <FormMessage />
                                        </FormItem>
                                    )}
                                />

                                <FormField
                                    control={form.control}
                                    name="trang_thai"
                                    render={({ field }) => (
                                        <FormItem className="flex flex-row items-center justify-between rounded-lg border p-4">
                                            <div className="space-y-0.5">
                                                <FormLabel className="text-base">
                                                    Trạng thái hoạt động
                                                </FormLabel>
                                                <div className="text-sm text-slate-500">
                                                    {field.value ? "Tài khoản đang mở" : "Tài khoản đang bị khóa"}
                                                </div>
                                            </div>
                                            <FormControl>
                                                <Switch
                                                    checked={field.value}
                                                    onCheckedChange={field.onChange}
                                                />
                                            </FormControl>
                                        </FormItem>
                                    )}
                                />
                            </div>

                            <DialogFooter>
                                <Button type="button" variant="outline" onClick={() => onOpenChange(false)}>
                                    Hủy
                                </Button>
                                <Button type="submit" disabled={updateUser.isPending}>
                                    {updateUser.isPending ? <Loader2 className="h-4 w-4 animate-spin mr-2" /> : null}
                                    Lưu thay đổi
                                </Button>
                            </DialogFooter>
                        </form>
                    </Form>
                </div>
            </DialogContent>
        </Dialog>
    );
}
