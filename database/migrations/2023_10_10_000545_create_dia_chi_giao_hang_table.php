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
            $table->string('Ho')->default(null);
            $table->string('Ten')->default(null);
            $table->string('SoDienThoai');
            $table->string('Email')->default(null);
            $table->string('ThanhPhoTinh');
            $table->string('QuanHuyen');
            $table->string('PhuongXa');
            $table->string('DiaChi');
            $table->string('GhiChu');
            $table->integer('MaKhachHang')->default(0);
            $table->integer('ThanhToan')->default(1);
            $table->timestamps();
            $table->foreign('MaKhachHang')
                ->references('MaKhachHang')->on('khach_hang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
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
