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
            $table->string('Ho')->default(null);
            $table->string('Ten')->default(null);
            $table->string('GioiTinh')->default(null);
            $table->string('NgaySinh')->default(null);
            $table->string('SoDienThoai')->default(null);
            $table->string('Email')->default(null);
            $table->string('ThanhPhoTinh')->default(null);
            $table->string('QuyenHuyen')->default(null);
            $table->string('PhuongXa')->default(null);
            $table->string('DiaChi')->default(null);
            $table->integer('MaTaiKhoan');
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
