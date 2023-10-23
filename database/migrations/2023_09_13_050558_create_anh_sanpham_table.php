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
        Schema::create('anh_san_pham', function (Blueprint $table) {
            $table->bigIncrements('MaAnh')->comment('Mã sản phẩm');
            $table->unsignedBigInteger('MaSanPham')->comment('Mã sản phẩm # Mã sản phẩm');
            $table->string('AnhChiTiet', 200);
            $table->string('TenAnh', 200);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('MaSanPham')
                ->references('MaSanPham')->on('san_pham');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anh_san_pham');
    }
};
