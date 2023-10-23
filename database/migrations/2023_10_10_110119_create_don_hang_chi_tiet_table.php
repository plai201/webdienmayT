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
        Schema::create('don_hang_chi_tiet', function (Blueprint $table) {
            $table->bigIncrements('MaDonHangChiTiet');
            $table->integer('MaSanPham');
            $table->string('TenSanPham');
            $table->integer('GiaGoc');
            $table->integer('GiaBan');
            $table->integer('GiamGia');
            $table->string('MaDatDon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang_chi_tiet');
    }
};
