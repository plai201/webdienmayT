<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Gate::define('danh-muc-san-pham-danh-sach','App\Policies\DanhMucSanPhamPolicy@view');
        Gate::define('danh-muc-san-pham-them','App\Policies\DanhMucSanPhamPolicy@create');
        Gate::define('danh-muc-san-pham-sua','App\Policies\DanhMucSanPhamPolicy@update');
        Gate::define('danh-muc-san-pham-xoa','App\Policies\DanhMucSanPhamPolicy@delete');
        Gate::define('danh-muc-san-pham-khoi-phuc','App\Policies\DanhMucSanPhamPolicy@restore');

        Gate::define('san-pham-danh-sach','App\Policies\SanPhamPolicy@view');
        Gate::define('san-pham-them','App\Policies\SanPhamPolicy@create');
        Gate::define('san-pham-sua','App\Policies\SanPhamPolicy@update');
        Gate::define('san-pham-xoa','App\Policies\SanPhamPolicy@delete');
        Gate::define('san-pham-khoi-phuc','App\Policies\SanPhamPolicy@restore');

        Gate::define('nhan-hang-danh-sach','App\Policies\NhanHangPolicy@view');
        Gate::define('nhan-hang-them','App\Policies\NhanHangPolicy@create');
        Gate::define('nhan-hang-sua','App\Policies\NhanHangPolicy@update');
        Gate::define('nhan-hang-xoa','App\Policies\NhanHangPolicy@delete');
        Gate::define('nhan-hang-khoi-phuc','App\Policies\NhanHangPolicy@restore');

        Gate::define('tai-khoan-danh-sach','App\Policies\UserPolicy@view');
        Gate::define('tai-khoan-them','App\Policies\UserPolicy@create');
        Gate::define('tai-khoan-sua','App\Policies\UserPolicy@update');
        Gate::define('tai-khoan-xoa','App\Policies\UserPolicy@delete');
        Gate::define('tai-khoan-khoi-phuc','App\Policies\UserPolicy@restore');

        Gate::define('vai-tro-danh-sach','App\Policies\VaiTroPolicy@view');
        Gate::define('vai-tro-them','App\Policies\VaiTroPolicy@create');
        Gate::define('vai-tro-sua','App\Policies\VaiTroPolicy@update');
        Gate::define('vai-tro-xoa','App\Policies\VaiTroPolicy@delete');
        Gate::define('vai-tro-khoi-phuc','App\Policies\VaiTroPolicy@restore');


        Gate::define('quyen-them','App\Policies\QuyenPolicy@view');
        Gate::define('quyen-thong-ke-xem','App\Policies\QuyenPolicy@xemThongKe');

        Gate::define('quyen-xem-don-hang','App\Policies\DonHangPolicy@view');
        Gate::define('quyen-xem-don-hang-chi-tiet','App\Policies\DonHangPolicy@viewDetail');
        Gate::define('quyen-don-hang-cap-nhap','App\Policies\DonHangPolicy@update');

        Gate::define('quyen-khuyen-mai-xem','App\Policies\KhuyenMaiPolicy@view');
        Gate::define('quyen-khuyen-mai-them','App\Policies\KhuyenMaiPolicy@create');
        Gate::define('quyen-khuyen-mai-sua','App\Policies\KhuyenMaiPolicy@update');
        Gate::define('quyen-khuyen-mai-xoa','App\Policies\KhuyenMaiPolicy@delete');

    }
}
