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
        Schema::create('giao_hang', function (Blueprint $table) {
            $table->bigIncrements('MaGiaoHang');
            $table->string('Ho')->nullable();
            $table->string('Ten')->nullable();
            $table->string('SoDienThoai');
            $table->string('Email')->nullable();
            $table->string('ThanhPhoTinh');
            $table->string('QuanHuyen');
            $table->string('PhuongXa');
            $table->string('DiaChi');
            $table->string('GhiChu')->nullable();
            $table->unsignedBigInteger('MaKhachHang')->nullable();
            $table->integer('ThanhToan')->default(1);
            $table->timestamps();

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_chi_giao_hang');
    }
};
