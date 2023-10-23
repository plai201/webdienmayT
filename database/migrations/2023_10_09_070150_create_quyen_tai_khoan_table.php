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
        Schema::create('quyen_tai_khoan', function (Blueprint $table) {
            $table->bigIncrements('MaQTK');
            $table->integer('MaQuyen');
            $table->integer('MaVaiTro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quyen_tai_khoan');
    }
};
