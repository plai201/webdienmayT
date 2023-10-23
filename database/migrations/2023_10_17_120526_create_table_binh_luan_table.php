<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->bigIncrements('MaDanhGia');
            $table->string('NoiDung');
            $table->string('TenDanhGia');
            $table->string('SoDienThoai')->default(null);
            $table->integer('MaSanPham');
            $table->string('NgayDanhGia');
            $table->string('AnhDanhGia')->default(null);
            $table->string('TenAnh')->default(null);
            $table->integer('TrangThai')->default(1);
             $table->foreign('MaSanPham')
                ->references('MaSanPham')->on('san_pham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luan');
    }
};
