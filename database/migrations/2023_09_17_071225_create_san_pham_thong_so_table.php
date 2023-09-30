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
            $table->bigIncrements("MaSPTS");
            $table->integer('MaSanPham');
            $table->integer('MaThongSo');
            $table->string('GiaTri');
            $table->timestamps();
            $table->softDeletes();
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
