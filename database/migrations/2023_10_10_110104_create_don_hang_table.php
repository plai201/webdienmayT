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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->bigIncrements('MaDonHang');
            $table->unsignedBigInteger('MaKhachHang')->nullable();
            $table->unsignedBigInteger('MaGiaoHang');
            $table->string('MaDatDon')->unique();
             $table->string('TrangThai');
             $table->string('NgayDonHang');
            $table->timestamps();
            $table->foreign('MaKhachHang')
                ->references('MaKhachHang')->on('khach_hang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('MaGiaoHang')
                ->references('MaGiaoHang')->on('giao_hang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
