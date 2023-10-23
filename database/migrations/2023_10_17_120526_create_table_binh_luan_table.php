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
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->bigIncrements('MaBinhLuan');
            $table->string('NoiDung');
            $table->string('TenBinhLuan');
            $table->string('SoDienThoai');
            $table->integer('MaSanPham');
            $table->string('NgayBinhLuan');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luan');
    }
};
