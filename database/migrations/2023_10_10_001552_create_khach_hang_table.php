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
            $table->string('Ho')->nullable();
            $table->string('Ten')->nullable();
            $table->string('GioiTinh')->nullable();
            $table->string('NgaySinh')->nullable();
            $table->string('SoDienThoai')->nullable();
            $table->string('Email')->nullable();
            $table->string('ThanhPhoTinh')->nullable();
            $table->string('QuyenHuyen')->nullable();
            $table->string('PhuongXa')->nullable();
            $table->string('DiaChi')->nullable();
            $table->unsignedBigInteger('MaTaiKhoan');
            $table->timestamps();
            $table->foreign('MaTaiKhoan')
                ->references('MaTaiKhoan')->on('users')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
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
