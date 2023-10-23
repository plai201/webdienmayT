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
        Schema::create('quyen_vai_tro', function (Blueprint $table) {
            $table->bigIncrements('MaQTK');
            $table->unsignedBigInteger('MaQuyen')->primary();
            $table->unsignedBigInteger('MaVaiTro')->primary();
             $table->foreign('MaVaiTro')
                ->references('MaVaiTro')->on('vai_tro')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('MaQuyen')
                ->references('MaQuyen')->on('quyen')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
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
