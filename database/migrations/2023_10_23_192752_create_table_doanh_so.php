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
        Schema::create('doanh_so', function (Blueprint $table) {
            $table->bigIncrements('MaDoanhSo');
            $table->string('NgayDonHang');
            $table->string('DoanhThu');
            $table->string('LoiNhuan');
            $table->integer('SoLuong');
            $table->integer('TongDonHang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doanh_so');
    }
};
