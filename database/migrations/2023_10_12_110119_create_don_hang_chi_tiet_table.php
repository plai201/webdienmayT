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
            $table->unsignedBigInteger('MaSanPham') ;
            $table->string('TenSanPham');
            $table->integer('GiaGoc');
            $table->integer('GiaBan');
            $table->integer('GiamGia');
            $table->integer('SoLuong');
            $table->string('MaDatDon') ;
            $table->unsignedBigInteger('MaKhuyenMai')->nullable();
            $table->timestamps();


            $table->foreign('MaSanPham')
                ->references('MaSanPham')->on('san_pham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('MaDatDon')
                ->references('MaDatDon')->on('don_hang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');

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
