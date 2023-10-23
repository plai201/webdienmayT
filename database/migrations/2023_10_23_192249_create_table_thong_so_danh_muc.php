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
        Schema::create('danh_muc_thong_so', function (Blueprint $table) {
            $table->unsignedBigInteger('MaDanhMuc');
            $table->unsignedBigInteger('MaThongSo');
            $table->timestamps();
            $table->primary(['MaDanhMuc', 'MaThongSo']);

            $table->foreign('MaDanhMuc')->references('MaDanhMuc')->on('danh_muc_san_pham'); // Ví dụ về khóa ngoại đến bảng "danh_muc"
            $table->foreign('MaThongSo')->references('MaThongSo')->on('thong_so_ky_thuat'); // Ví dụ về khóa ngoại đến bảng "thong_so"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_muc_thong_so');
    }
};
