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
Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');

Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');
Route::get('/trang-chu', function () {
    return view('trangchu');
});
Route::get('/search', 'App\Http\Controllers\SanPhamController@search');
Route::get('/get', 'App\Http\Controllers\SanPhamController@getsanphamthongso');

Route::post('/post', 'App\Http\Controllers\SanPhamController@postsanphamthongso')->name('postsanphamthongso');
Route::get('/xoasanphamthongso/{MaSanPham}/{MaThongSo}', 'App\Http\Controllers\SanPhamController@xoasanphamthongso')
    ->name('xoa-san-pham-thong-so');

Route::get('/getDanhMucSanPham/{MaDanhMuc}',[
 'as' => 'getDanhMucSanPham',
 'uses' => 'App\Http\Controllers\SanPhamController@getDanhMucSanPham'
]);


Route::get('/home', function () {
    return view('home');
});
Route::prefix('admin')->group(function () {

    Route::prefix('danh-muc-san-pham')->group(function () {
        Route::get('/',[
            'as' => 'danh-muc-san-pham.trangChu',
            'uses' => 'App\Http\Controllers\DanhMucSanPhamController@trangChu'
        ]);

        Route::get('/them',[
            'as' => 'danh-muc-san-pham.them',
            'uses' => 'App\Http\Controllers\DanhMucSanPhamController@them'
        ]);

        Route::post('/them-danh-muc',[
            'as' => 'danh-muc-san-pham.themDanhMuc',
            'uses' => 'App\Http\Controllers\DanhMucSanPhamController@themDanhMuc'
        ]);

        Route::get('/sua/{MaDanhMuc}',[
            'as' => 'danh-muc-san-pham.sua',
            'uses' => 'App\Http\Controllers\DanhMucSanPhamController@sua'
        ]);
        Route::post('/cap-nhap/{MaDanhMuc}',[
            'as' => 'danh-muc-san-pham.capNhap',
            'uses' => 'App\Http\Controllers\DanhMucSanPhamController@capNhap'
        ]);

        Route::get('/xoa/{MaDanhMuc}',[
            'as' => 'danh-muc-san-pham.xoa',
            'uses' => 'App\Http\Controllers\DanhMucSanPhamController@xoa'
        ]);
        Route::get('/danh-sach-da-xoa',[
            'as' => 'danh-muc-san-pham.danh-sach-da-xoa',
            'uses' => 'App\Http\Controllers\DanhMucSanPhamController@danhSachDaXoa'
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
            'uses' => 'App\Http\Controllers\SanPhamController@trangChu'
        ]);
        Route::get('/them',[
            'as' => 'san-pham.them',
            'uses' => 'App\Http\Controllers\SanPhamController@them'
        ]);
        Route::post('/them-san-pham',[
            'as' => 'san-pham.them-san-pham',
            'uses' => 'App\Http\Controllers\SanPhamController@themSanPham'
        ]);
        Route::get('/sua/{MaSanPham}',[
            'as' => 'san-pham.sua',
            'uses' => 'App\Http\Controllers\SanPhamController@sua'
        ]);
        Route::post('/cap-nhap/{MaSanPham}',[
            'as' => 'san-pham.capNhap',
            'uses' => 'App\Http\Controllers\SanPhamController@capNhap'
        ]);

        Route::get('/xoa/{MaSanPham}',[
            'as' => 'san-pham.xoa',
            'uses' => 'App\Http\Controllers\SanPhamController@xoa'
        ]);
        Route::get('/select-sanpham',[
            'as' => 'san-pham.delete',
            'uses' => 'App\Http\Controllers\SanPhamController@xoaTatCa'
        ]);

        Route::get('/danh-sach-da-xoa',[
            'as' => 'san-pham.danh-sach-da-xoa',
            'uses' => 'App\Http\Controllers\SanPhamController@danhSachDaXoa'
        ]);
        Route::get('/khoi-phuc/{MaSanPham}',[
            'as' => 'san-pham.khoiPhuc',
            'uses' => 'App\Http\Controllers\SanPhamController@khoiPhuc'
        ]);
        Route::get('/xoa-vinh-vien/{MaSanPham}',[
            'as' => 'san-pham.xoaVinhVien',
            'uses' => 'App\Http\Controllers\SanPhamController@xoaVinhVien'
        ]);




    });

    Route::prefix('nhan-hang')->group(function (){
        Route::get('/',[
            'as' => 'nhan-hang.trangChu',
            'uses' => 'App\Http\Controllers\NhanHangController@trangChu'
        ]);
        Route::get('/them',[
            'as' => 'nhan-hang.them',
            'uses' => 'App\Http\Controllers\NhanHangController@them'
        ]);
        Route::post('/them-nhan-hang',[
            'as' => 'nhan-hang.them-nhan-hang',
            'uses' => 'App\Http\Controllers\NhanHangController@themNhanHang'
        ]);
        Route::get('/sua/{MaNhanHang}',[
            'as' => 'nhan-hang.sua',
            'uses' => 'App\Http\Controllers\NhanHangController@sua'
        ]);
        Route::post('/cap-nhap/{MaNhanHang}',[
            'as' => 'nhan-hang.capNhap',
            'uses' => 'App\Http\Controllers\NhanHangController@capNhap'
        ]);

        Route::get('/xoa/{MaNhanHang}',[
            'as' => 'nhan-hang.xoa',
            'uses' => 'App\Http\Controllers\NhanHangController@xoa'
        ]);
        Route::get('/danh-sach-da-xoa',[
            'as' => 'nhan-hang.danh-sach-da-xoa',
            'uses' => 'App\Http\Controllers\NhanHangController@danhSachDaXoa'
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

});


