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
            $table->string('TenSanPham', 191)->comment('Tên sản phẩm # Tên sản phẩm')->unique();
            $table->integer('GiamGia')->default('0')->comment('Giảm giá #Phần trăm giảm giá bán sản phẩm');
            $table->integer('GiaBan')->default('0')->comment('Giá bán # Giá bán hiện tại của sản phẩm');
            $table->integer('GiaGoc')->default('0')->comment('Giá gốc # Giá gốc của sản phẩm');
            $table->string('AnhSanPham', 255)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->string('TenAnh', 255)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->text('MoTaSanPham')->comment('Mô tả # Mô tả về sản phẩm');
            $table->integer('TrangThai')->default('2')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedBigInteger('MaDanhMuc')->comment('Loại sản phẩm # Mã danh muc san pham');
            $table->unsignedBigInteger('MaTaiKhoan')->comment('Tài khoản # Mã tài khoản');
            $table->unsignedBigInteger('MaNhanHang')->comment('Nhãn hàng # Mã nhãn hàng, thuương hiệu');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('TraGop')->default('0')->comment('Trả góp');

            $table->integer('LuotXem')->nullable();
            $table->integer('SanPhamSoLuong')->default('0');
            $table->integer('SanPhamBan')->nullable();

            $table->foreign('MaDanhMuc')
            ->references('MaDanhMuc')->on('danh_muc_san_pham')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('MaNhanHang')
                ->references('MaNhanHang')->on('nhan_hang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('MaTaiKhoan')
                ->references('MaTaiKhoan')->on('users');

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
