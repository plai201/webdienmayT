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
        Schema::create('khuyen_mai', function (Blueprint $table) {
            $table->bigIncrements('MaKhuyenMai');
            $table->string('TenKhuyenMai');
            $table->string('Ma');
            $table->integer('SoLuong');
            $table->integer('TinhNangMa');
            $table->integer('GiaTri');
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
        Schema::dropIfExists('khuyen_mai');
    }
};
