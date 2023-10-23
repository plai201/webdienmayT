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
        Schema::create('vai_tro_tai_khoan', function (Blueprint $table) {
            $table->bigIncrements('MaVTTK');
            $table->unsignedBigInteger('MaVaiTro');
            $table->unsignedBigInteger('MaTaiKhoan');
             $table->foreign('MaVaiTro')
                ->references('MaVaiTro')->on('vai_tro');
             $table->foreign('MaTaiKhoan')
                ->references('MaTaiKhoan')->on('users');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vai_tro_tai_khoan');
    }
};
