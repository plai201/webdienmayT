<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_san_pham', function (Blueprint $table) {
            $table->bigIncrements('MaTheSanPham')->comment('Mã thẻ sản phẩm');
            $table->unsignedBigInteger('MaSanPham')->comment('Mã sản phẩm')->primary();
            $table->unsignedBigInteger('MaThe')->comment('Mã thẻ')->primary();
            $table->timestamps();
            $table->foreign('MaSanPham')
                ->references('MaSanPham')->on('san_pham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('MaThe')
                ->references('MaThe')->on('the')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('the_san_pham');
    }
}
