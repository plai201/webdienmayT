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
        Schema::create('danh_muc_san_pham', function (Blueprint $table) {
            $table->bigIncrements('MaDanhMuc');
            $table->string('TenDanhMuc');
            $table->integer("DanhMucCha")->default(0);
            $table->string('Anh')->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_muc_san_pham');
    }
};
