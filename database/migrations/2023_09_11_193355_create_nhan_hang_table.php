<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_hang', function (Blueprint $table) {
            $table->bigIncrements('MaNhanHang')->comment('Mã nhãn hàng');
            $table->string('TenNhanHang', 191)->comment('Tên nhãn hàng # Tên nhãn hàng');
            $table->string('Anh', 200)->comment('Hình đại diện # Hình đại diện của nhãn hàng');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhan_hang');
    }
}
