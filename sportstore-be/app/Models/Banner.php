<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'tieu_de',
        'hinh_anh',
        'duong_dan',
        'thu_tu',
        'trang_thai',
    ];
}
