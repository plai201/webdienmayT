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
            $table->integer('MaVaiTro');
            $table->integer('MaTaiKhoan');
            $table->timestamps();
            $table->foreign('MaVaiTro')
                ->references('MaVaiTro')->on('vai_tro')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('vai_tro_tai_khoan');
    }
};
