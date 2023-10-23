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
        Schema::create('quyen', function (Blueprint $table) {
            $table->bigIncrements('MaQuyen');
            $table->string('TenQuyen');
            $table->string('TenHienThi');
            $table->integer('MaQuyenCha')->default(0);
            $table->string('MaPhanQuyen')->default(null);
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quyen');
    }
};
