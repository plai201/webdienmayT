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
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->bigIncrements('MaKhachHang');
            $table->string('Ho');
            $table->string('Ten');
            $table->string('GioiTinh');
            $table->string('NgaySinh');
            $table->string('SoDienThoai');
            $table->string('Email');
            $table->string('ThanhPhoTinh');
            $table->string('QuyenHuyen');
            $table->string('PhuongXa');
            $table->string('DiaChi');
            $table->integer('MaTaiKhoan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hang');
    }
};
