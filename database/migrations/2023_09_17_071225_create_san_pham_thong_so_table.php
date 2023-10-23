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
        Schema::create('san_pham_thong_so', function (Blueprint $table) {
            $table->bigIncrements("MaSPTS")->primary();
            $table->integer('MaSanPham')->primary();
            $table->integer('MaThongSo')->primary();
            $table->string('GiaTri');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('MaSanPham')
                ->references('MaSanPham')->on('san_pham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('MaThongSo')
                ->references('MaThongSo')->on('thong_so_ky_thuat')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_thong_so');
    }
};
