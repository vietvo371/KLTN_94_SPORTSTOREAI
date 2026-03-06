<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de', 255)->nullable();
            $table->string('hinh_anh', 255);
            $table->string('duong_dan', 255)->nullable();
            $table->integer('thu_tu')->default(0);
            $table->boolean('trang_thai')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
