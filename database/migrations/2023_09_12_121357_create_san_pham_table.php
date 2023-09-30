<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {

            $table->bigIncrements('MaSanPham')->comment('Mã sản phẩm');
            $table->string('TenSanPham', 191)->comment('Tên sản phẩm # Tên sản phẩm');
            $table->unsignedInteger('GiaGoc')->default('0')->comment('Giá gốc # Giá gốc của sản phẩm');

            $table->unsignedInteger('GiamGia')->default('0')->comment('Giảm giá #Phần trăm giảm giá bán sản phẩm');
            $table->unsignedInteger('GiaBan')->default('0')->comment('Giá bán # Giá bán hiện tại của sản phẩm');
            $table->unsignedInteger('TraGop')->default('0')->comment('Trả góp');
            $table->string('Anh', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->text('MoTaSanPham')->comment('Mô tả # Mô tả về sản phẩm');

            $table->tinyInteger('TrangThai')->default('2')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedTinyInteger('MaDanhMuc')->comment('Loại sản phẩm # Mã danh muc san pham');

            $table->unsignedTinyInteger('MataiKhoan')->comment('Tài khoản # Mã tài khoản');
            $table->unsignedTinyInteger('MaNhanHang')->comment('Nhãn hàng # Mã nhãn hàng, thuương hiệu');


            $table->timestamps();
            $table->softDeletes();
//            $table->foreign('MaDanhMuc') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
//            ->references('MaDanhMuc')->on('danh-muc-san-pham') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
//            ->onDelete('CASCADE')
//                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
