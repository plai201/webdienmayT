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
            $table->integer('MaSanPham')->comment('Mã sản phẩm');
            $table->integer('MaThe')->comment('Mã thẻ');
            $table->timestamps();
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
