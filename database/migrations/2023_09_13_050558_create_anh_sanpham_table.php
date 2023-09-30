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
        Schema::create('anh_sanpham', function (Blueprint $table) {
            $table->bigIncrements('MaAnh')->comment('Mã sản phẩm');
            $table->integer('MaSanPham')->comment('Mã sản phẩm # Mã sản phẩm');
            $table->string('AnhChiTiet', 200);
            $table->string('TenAnh', 200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anh_sanpham');
    }
};