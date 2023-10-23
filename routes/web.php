<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', 'App\Http\Controllers\AdminController@loginAdmin')->name('login');

Route::post('/login', 'App\Http\Controllers\AdminController@postLoginAdmin')->name('login.post');
Route::post('/logout', 'App\Http\Controllers\AdminController@logout')->name('logout');
Route::post('/them-user-khach', 'App\Http\Controllers\LoginController@themTaiKhoanKhach')->name('user.them-user-khach');

Route::post('/post', 'App\Http\Controllers\SanPhamController@postsanphamthongso')->name('postsanphamthongso');
Route::get('/xoasanphamthongso/{MaSanPham}/{MaThongSo}', 'App\Http\Controllers\SanPhamController@xoasanphamthongso')
    ->name('xoa-san-pham-thong-so');

Route::get('/getDanhMucSanPham/{MaDanhMuc}',[
 'as' => 'getDanhMucSanPham',
 'uses' => 'App\Http\Controllers\SanPhamController@getDanhMucSanPham'
]);




Route::prefix('trang-chu')->group(function (){
    Route::get('/','App\Http\Controllers\TrangChuController@trangChu')
        ->name('trang-chu');
    Route::post('/search', 'App\Http\Controllers\SanPhamController@search')->name('search');
    Route::get('/get', 'App\Http\Controllers\SanPhamController@getsanphamthongso');
    Route::post('/tim-san-pham', 'App\Http\Controllers\TrangChuController@search')->name('tim-san-pham');


    Route::get('/danh-muc/{MaDanhMuc}', 'App\Http\Controllers\TrangChuController@danhMucView')
        ->name('danh-muc-view');

    Route::get('/chi-tiet-san-pham/{MaSanPham}', 'App\Http\Controllers\ChiTetSanPhamController@trangChu')
        ->name('chi-tiet-san-pham');
    Route::get('/load-danh-gia', 'App\Http\Controllers\ChiTetSanPhamController@loadDanhGia')
        ->name('load-danh-gia');
    Route::post('/them-danh-gia', 'App\Http\Controllers\ChiTetSanPhamController@themDanhGia')
        ->name('them-danh-gia');
    Route::get('/them-san-pham-gio-hang/{MaSanPham}', 'App\Http\Controllers\GioHangController@themSanPhamGioHang')
        ->name('san-pham-gio-hang');
    Route::get('/them-san-pham-gio-hang-mua/{MaSanPham}', 'App\Http\Controllers\GioHangController@themSanPhamGioHangLive')
        ->name('san-pham-gio-hang-live');
    Route::get('/san-pham-gio-hang', 'App\Http\Controllers\ChiTetSanPhamController@sanPhamGioHang')
        ->name('san-pham-gio-hang.gio-hang');

    Route::get('/trang-ca-nhan', 'App\Http\Controllers\TrangCaNhanController@trangchu')
        ->name('trang-ca-nhan');

    Route::get('/gio-hang', 'App\Http\Controllers\GioHangController@trangChu')
        ->name('gio-hang');
    Route::get('/update-cart', 'App\Http\Controllers\GioHangController@updateCart')
        ->name('update.cart');
    Route::get('/xoa-cart', 'App\Http\Controllers\GioHangController@xoaGioHang')
        ->name('xoa.cart');
    Route::get('dropdown', 'App\Http\Controllers\GioHangController@getThanhPho')
        ->name('dropdown');
    Route::get('get-quan-huyen', 'App\Http\Controllers\GioHangController@getQuanHuyen')
        ->name('get-quan-huyen');
    Route::get('get-phuong-xa', 'App\Http\Controllers\GioHangController@getPhuongXa')
        ->name('get-phuong-xa');

    Route::post('/check-out', 'App\Http\Controllers\GioHangController@checkOut')
        ->name('check-out');

    Route::post('/them-dia-chi', 'App\Http\Controllers\GioHangController@themDiaChi')
        ->name('them-dia-chi');
    Route::get('/sua-dia-chi/{id}', 'App\Http\Controllers\GioHangController@suaDiaChi')
        ->name('sua-dia-chi');
    Route::post('/cap-nhap-dia-chi/{id}', 'App\Http\Controllers\GioHangController@capNhapDiaChi')
        ->name('cap-nhap-dia-chi');
    Route::get('/xoa-dia-chi/{id}', 'App\Http\Controllers\GioHangController@xoaDiaChi')
        ->name('xoa-dia-chi');
    Route::post('/check-out-logined', 'App\Http\Controllers\GioHangController@checkOuted')
        ->name('check-out-logined');

    Route::get('/trang-ca-nhan/cap-nhap/{id}', 'App\Http\Controllers\TrangCaNhanController@thongTinKH')
        ->name('cap-nhap-thong-tin-khach-hang');
    Route::post('/trang-ca-nhan/cap-nhap-thong-tin-khach-hang/{id}', 'App\Http\Controllers\TrangCaNhanController@capNhapThongTinKH')
        ->name('cap-nhap-thong-tin-khach-hang');

});




Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'App\Http\Controllers\AdminController@home')
        ->name('home');
    Route::prefix('admin')->group(function () {

        Route::prefix('danh-muc-san-pham')->group(function () {
            Route::get('/',[
                'as' => 'danh-muc-san-pham.trangChu',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@trangChu',
                'middleware'=> 'can:danh-muc-san-pham-danh-sach'
            ]);
            Route::post('/search', 'App\Http\Controllers\DanhMucSanPhamController@search')->name('searchdanhmuc');


            Route::get('/them',[
                'as' => 'danh-muc-san-pham.them',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@them',
                'middleware'=> 'can:danh-muc-san-pham-them'
            ]);

            Route::post('/them-danh-muc',[
                'as' => 'danh-muc-san-pham.themDanhMuc',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@themDanhMuc'
            ]);

            Route::get('/sua/{MaDanhMuc}',[
                'as' => 'danh-muc-san-pham.sua',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@sua',
                'middleware'=> 'can:danh-muc-san-pham-sua'
            ]);
            Route::post('/cap-nhap/{MaDanhMuc}',[
                'as' => 'danh-muc-san-pham.capNhap',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@capNhap'
            ]);

            Route::get('/xoa/{MaDanhMuc}',[
                'as' => 'danh-muc-san-pham.xoa',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@xoa',
                'middleware'=> 'can:danh-muc-san-pham-xoa'

            ]);
            Route::get('/danh-sach-da-xoa',[
                'as' => 'danh-muc-san-pham.danh-sach-da-xoa',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@danhSachDaXoa',
                'middleware'=> 'can:danh-muc-san-pham-khoi-phuc'

            ]);
            Route::get('/khoi-phuc/{MaDanhMuc}',[
                'as' => 'danh-muc-san-pham.khoiPhuc',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@khoiPhuc'
            ]);
            Route::get('/xoa-vinh-vien/{MaDanhMuc}',[
                'as' => 'danh-muc-san-pham.xoaVinhVien',
                'uses' => 'App\Http\Controllers\DanhMucSanPhamController@xoaVinhVien'
            ]);

        });

        Route::prefix('san-pham')->group(function (){
            Route::get('/',[
                'as' => 'san-pham.trangChu',
                'uses' => 'App\Http\Controllers\SanPhamController@trangChu',
                'middleware'=> 'can:san-pham-danh-sach'
            ]);
            Route::get('/them',[
                'as' => 'san-pham.them',
                'uses' => 'App\Http\Controllers\SanPhamController@them',
                'middleware'=> 'can:san-pham-them'
            ]);
            Route::post('/them-san-pham',[
                'as' => 'san-pham.them-san-pham',
                'uses' => 'App\Http\Controllers\SanPhamController@themSanPham'
            ]);
            Route::get('/sua/{MaSanPham}',[
                'as' => 'san-pham.sua',
                'uses' => 'App\Http\Controllers\SanPhamController@sua',
                'middleware'=> 'can:san-pham-sua'
            ]);
            Route::post('/cap-nhap/{MaSanPham}',[
                'as' => 'san-pham.capNhap',
                'uses' => 'App\Http\Controllers\SanPhamController@capNhap'
            ]);

            Route::get('/xoa/{MaSanPham}',[
                'as' => 'san-pham.xoa',
                'uses' => 'App\Http\Controllers\SanPhamController@xoa',
                'middleware'=> 'can:san-pham-xoa'
            ]);
            Route::get('/select-sanpham',[
                'as' => 'san-pham.delete',
                'uses' => 'App\Http\Controllers\SanPhamController@xoaTatCa'
            ]);

            Route::get('/danh-sach-da-xoa',[
                'as' => 'san-pham.danh-sach-da-xoa',
                'uses' => 'App\Http\Controllers\SanPhamController@danhSachDaXoa',
                'middleware'=> 'can:san-pham-khoi-phuc'
            ]);
            Route::get('/khoi-phuc/{MaSanPham}',[
                'as' => 'san-pham.khoiPhuc',
                'uses' => 'App\Http\Controllers\SanPhamController@khoiPhuc'
            ]);
            Route::get('/xoa-vinh-vien/{MaSanPham}',[
                'as' => 'san-pham.xoaVinhVien',
                'uses' => 'App\Http\Controllers\SanPhamController@xoaVinhVien'
            ]);
            Route::get('/danh-gia',[
                'as' => 'danhgia.trangchu',
                'uses' => 'App\Http\Controllers\AdminController@qlDanhGia'
            ]);
            Route::get('/danh-gia/xem/{id}',[
                'as' => 'danhgia.xem',
                'uses' => 'App\Http\Controllers\AdminController@qlDanhGiaXem'
            ]);
            Route::post('/danh-gia/cap-nhap/{id}',[
                'as' => 'danhgia.cap-nhap',
                'uses' => 'App\Http\Controllers\AdminController@qlDanhGiaCapNhap'
            ]);

        });

        Route::prefix('nhan-hang')->group(function (){
            Route::get('/',[
                'as' => 'nhan-hang.trangChu',
                'uses' => 'App\Http\Controllers\NhanHangController@trangChu',
                'middleware'=> 'can:nhan-hang-danh-sach'
            ]);
            Route::post('/search', 'App\Http\Controllers\NhanHangController@search')->name('searchnhanhang');

            Route::get('/them',[
                'as' => 'nhan-hang.them',
                'uses' => 'App\Http\Controllers\NhanHangController@them',
                'middleware'=> 'can:nhan-hang-them'
            ]);
            Route::post('/them-nhan-hang',[
                'as' => 'nhan-hang.them-nhan-hang',
                'uses' => 'App\Http\Controllers\NhanHangController@themNhanHang'
            ]);
            Route::get('/sua/{MaNhanHang}',[
                'as' => 'nhan-hang.sua',
                'uses' => 'App\Http\Controllers\NhanHangController@sua',
                'middleware'=> 'can:nhan-hang-sua'
            ]);
            Route::post('/cap-nhap/{MaNhanHang}',[
                'as' => 'nhan-hang.capNhap',
                'uses' => 'App\Http\Controllers\NhanHangController@capNhap'
            ]);

            Route::get('/xoa/{MaNhanHang}',[
                'as' => 'nhan-hang.xoa',
                'uses' => 'App\Http\Controllers\NhanHangController@xoa',
                'middleware'=> 'can:nhan-hang-xoa'
            ]);
            Route::get('/danh-sach-da-xoa',[
                'as' => 'nhan-hang.danh-sach-da-xoa',
                'uses' => 'App\Http\Controllers\NhanHangController@danhSachDaXoa',
                'middleware'=> 'can:nhan-hang-khoi-phuc'
            ]);
            Route::get('/khoi-phuc/{MaNhanHang}',[
                'as' => 'nhan-hang.khoiPhuc',
                'uses' => 'App\Http\Controllers\NhanHangController@khoiPhuc'
            ]);
            Route::get('/xoa-vinh-vien/{MaNhanHang}',[
                'as' => 'nhan-hang.xoaVinhVien',
                'uses' => 'App\Http\Controllers\NhanHangController@xoaVinhVien'
            ]);
        });

        Route::prefix('users')->group(function (){
            Route::get('/',[
                'as' => 'users.trangChu',
                'uses' => 'App\Http\Controllers\AdminController@trangChu',
                'middleware'=> 'can:tai-khoan-danh-sach'
            ]);
            Route::post('/search', 'App\Http\Controllers\AdminController@search')
                ->name('searchuser');

            Route::get('/them',[
                'as' => 'user.them',
                'uses' => 'App\Http\Controllers\AdminController@them',
                'middleware'=> 'can:tai-khoan-them'
            ]);
            Route::post('/them-user',[
                'as' => 'user.them-user',
                'uses' => 'App\Http\Controllers\AdminController@themTaiKhoan'
            ]);

            Route::get('/sua/{MaTaiKhoan}',[
                'as' => 'user.sua',
                'uses' => 'App\Http\Controllers\AdminController@suaTaiKhoan',
                'middleware'=> 'can:tai-khoan-sua'
            ]);
            Route::post('/cap-nhap/{MaTaiKhoan}',[
                'as' => 'user.cap-nhap',
                'uses' => 'App\Http\Controllers\AdminController@capNhapTaiKhoan'
            ]);
            Route::get('/xoa/{MaTaiKhoan}',[
                'as' => 'user.xoa',
                'uses' => 'App\Http\Controllers\AdminController@xoa',
//                'middleware'=> 'can:tai-khoan-xoa'
            ]);
            Route::get('/danh-sach-da-xoa',[
                'as' => 'user.danh-sach-da-xoa',
                'uses' => 'App\Http\Controllers\AdminController@danhSachDaXoa',
//                'middleware'=> 'can:tai-khoan-khoi-phuc'
            ]);
            Route::get('/khoi-phuc/{MaTaiKhoan}',[
                'as' => 'user.khoiPhuc',
                'uses' => 'App\Http\Controllers\AdminController@khoiPhuc'
            ]);
            Route::get('/xoa-vinh-vien/{MaTaiKhoan}',[
                'as' => 'user.xoaVinhVien',
                'uses' => 'App\Http\Controllers\AdminController@xoaVinhVien'
            ]);
            Route::get('/khach-hang',[
                'as' => 'khach-hang.trangChu',
                'uses' => 'App\Http\Controllers\AdminController@trangChuKhachHang',
//                'middleware'=> 'can:khach-hang-danh-sach'
            ]);
            Route::get('/khach-hang/{id}',[
                'as' => 'khach-hang.sua',
                'uses' => 'App\Http\Controllers\AdminController@suaKhachHang',
//                'middleware'=> 'can:tai-khoan-danh-sach'
            ]);

        });
        Route::prefix('roles')->group(function (){
            Route::get('/',[
                'as' => 'roles.trangChu',
                'uses' => 'App\Http\Controllers\AdminRoleController@trangChu',
                'middleware'=> 'can:vai-tro-danh-sach'
            ]);
            Route::get('/them',[
                'as' => 'roles.them',
                'uses' => 'App\Http\Controllers\AdminRoleController@them',
                'middleware'=> 'can:vai-tro-them'
            ]);
            Route::post('/them-vai-tro',[
                'as' => 'roles.them-vai-tro',
                'uses' => 'App\Http\Controllers\AdminRoleController@themVaiTro'
            ]);
            Route::get('/sua/{MaVaiTro}',[
                'as' => 'roles.sua',
                'uses' => 'App\Http\Controllers\AdminRoleController@suaVaiTro',
                'middleware'=> 'can:vai-tro-sua'
            ]);
            Route::post('/cap-nhap/{MaVaiTro}',[
                'as' => 'roles.cap-nhap',
                'uses' => 'App\Http\Controllers\AdminRoleController@capNhapVaiTro'
            ]);
            Route::get('/xoa/{MaVaiTro}',[
                'as' => 'roles.xoa',
                'uses' => 'App\Http\Controllers\AdminRoleController@xoa'
            ]);

        });
        Route::prefix('permission')->group(function (){
            Route::get('/',[
                'as' => 'permission.them',
                'uses' => 'App\Http\Controllers\AdminRoleController@themQuyen',
                'middleware'=> 'can:quyen-them'
            ]);
            Route::post('/them-quyen',[
                'as' => 'permission.them-quyen',
                'uses' => 'App\Http\Controllers\AdminRoleController@themQuyenModule',
            ]);

        });
        Route::prefix('thong-ke')->group(function (){
            Route::get('/',[
                'as' => 'thong-ke.trangchu',
                'uses' => 'App\Http\Controllers\AdminController@thongke',
                'middleware'=> 'can:quyen-thong-ke-xem'
            ]);
            Route::get('/loc',[
                'as' => 'thong-ke.loc',
                'uses' => 'App\Http\Controllers\AdminController@thongKeByDay',
             ]);
            Route::get('/loc-chon',[
                'as' => 'thong-ke.loc-chon',
                'uses' => 'App\Http\Controllers\AdminController@thongKeChon',
             ]);
            Route::get('/loc-load',[
                'as' => 'thong-ke.loc-load',
                'uses' => 'App\Http\Controllers\AdminController@thongKeChonLoad',
             ]);

        });
        Route::prefix('don-hang')->group(function (){
            Route::get('/',[
                'as' => 'don-hang.trangchu',
                'uses' => 'App\Http\Controllers\DonHangController@trangchu',
                'middleware'=> 'can:quyen-xem-don-hang'
            ]);
            Route::get('/{MaDatDon}',[
                'as' => 'don-hang.xem',
                'uses' => 'App\Http\Controllers\DonHangController@xemDonHang',
                'middleware'=> 'can:quyen-xem-don-hang-chi-tiet'
            ]);
            Route::post('/cap-nhap/{MaDatDon}',[
                'as' => 'don-hang.cap-nhap',
                'uses' => 'App\Http\Controllers\DonHangController@capNhap',
                'middleware'=> 'can:quyen-don-hang-cap-nhap'
            ]);

        });
        Route::prefix('khuyen-mai')->group(function (){
            Route::get('/',[
                'as' => 'khuyen-mai.trangchu',
                'uses' => 'App\Http\Controllers\KhuyenMaiController@trangchu',
                'middleware'=> 'can:quyen-khuyen-mai-xem'
            ]);
            Route::get('/them',[
                'as' => 'khuyen-mai.them',
                'uses' => 'App\Http\Controllers\KhuyenMaiController@them',
                'middleware'=> 'can:quyen-khuyen-mai-them'
            ]);
            Route::post('/them-ma',[
                'as' => 'khuyen-mai.them-ma',
                'uses' => 'App\Http\Controllers\KhuyenMaiController@themMa',
             ]);
            Route::get('/xoa/{MaKhuyenMai}',[
                'as' => 'khuyen-mai.xoa',
                'uses' => 'App\Http\Controllers\KhuyenMaiController@xoa',
                'middleware'=> 'can:quyen-khuyen-mai-xoa'
            ]);
            Route::get('/sua/{MaKhuyenMai}',[
                'as' => 'khuyen-mai.sua',
                'uses' => 'App\Http\Controllers\KhuyenMaiController@sua',
                'middleware'=> 'can:quyen-khuyen-mai-sua'
            ]);
            Route::post('/cap-nhap/{MaKhuyenMai}',[
                'as' => 'khuyen-mai.cap-nhap',
                'uses' => 'App\Http\Controllers\KhuyenMaiController@capNhap',
//                'middleware'=> 'can:quyen-them'
            ]);
            Route::post('/ap-dung',[
                'as' => 'khuyen-mai.ap-dung',
                'uses' => 'App\Http\Controllers\GioHangController@checkKhuyenMai',
//                'middleware'=> 'can:quyen-them'
            ]);

        });

    });

});

