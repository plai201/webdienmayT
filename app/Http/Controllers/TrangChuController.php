<?php

namespace App\Http\Controllers;

use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use View;

class TrangChuController extends Controller
{
    public function __construct()
    {
        $danhmuc = DanhMucSanPham::where('DanhMucCha',0)->get();
        View::share('danhmuc', $danhmuc);
    }
    public function trangChu(){
        $sanpham = SanPham::where('TrangThai',2)->get();
        $danhmuc = DanhMucSanPham::where('DanhMucCha',0)->get();
        return view('trangChu',compact('sanpham','danhmuc'));
    }
    public function danhMucView ($madanhmuc){
        $danhmucha = DanhMucSanPham::find($madanhmuc);
        $danhmucsanpham = DanhMucSanPham::where('DanhMucCha', $madanhmuc)->get();

        // Lấy danh sách mã danh mục sản phẩm
        $maDanhMucSanPham = $danhmucsanpham->pluck('MaDanhMuc');

        // Sử dụng Eloquent để lấy sản phẩm và phân trang
        $sanpham = SanPham::whereIn('MaDanhMuc', $maDanhMucSanPham)->paginate(10);
        $sanpham_count = $sanpham->count();


        return view('frontend.sanphamdanhmuc.sanphamdanhmuc',compact('sanpham','sanpham_count','danhmucha'));
    }
    public function search(Request $request){
        $data = $request->all();
        if($data['key']){
            $sanpham =SanPham::where('TenSanPham', 'LIKE', '%'.$data['key'].'%')->get();
            $output ='
            <ul class="dropdown-menu " style="display: block; position: relative; cursor: pointer;">';
            foreach ($sanpham as $sp){
                $output .= '<li class="auto-complete"><a href="' . route('chi-tiet-san-pham', ['MaSanPham' => $sp->MaSanPham]) . '">';
                 $output .= '<img src="'.$sp->AnhSanPham.'" alt="'.$sp->TenAnh.'" class="product-image">';
                $output .= '<div class="product-details">';
                $output .= '<span class="product-name">' . $sp->TenSanPham . '</span>';
                $output .= '<div class="sale-pro"><span class="product-price">' . number_format($sp->GiaGoc) .'đ</span>';
                $output .= '<span class="product-discount"> ' . $sp->GiamGia . '% </span> </div> ';
                $output .= '<span class="product-price-sale"> ' . number_format($sp->GiaBan) . 'đ </span>';
                $output .= '</div>';
                $output .= '</a></li>';
            }
            $output .='</ul>';
            return $output;
        }

    }



}
