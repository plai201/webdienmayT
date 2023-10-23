<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use View;
class ChiTetSanPhamController extends Controller
{
    public function __construct()
    {
        $danhmuc = DanhMucSanPham::where('DanhMucCha',0)->get();
        View::share('danhmuc', $danhmuc);
    }
    public function trangChu($masanpham){
        $sanpham = SanPham::find($masanpham);
        $sanpham->LuotXem  = $sanpham->LuotXem + 1 ;
        $sanpham->save();
        $danhmucsanpham = $sanpham->danhmucsanpham;
        $madanhmucsanphamcha = $danhmucsanpham->DanhMucCha;
        $danhmucsanphamcha= DanhMucSanPham::find($madanhmucsanphamcha);
        $danhgia = DanhGia::where('MaSanPham',$masanpham)->get();
        $danhgia_count = $danhgia->count();
        $tongdanhgia = $danhgia->sum('DanhGia'); // Tổng số sao
        $trungbinh = $danhgia->count() > 0 ? $tongdanhgia / $danhgia_count : 0;
        return view('frontend.chitetsanpham.chitietsanpham',compact('sanpham','danhmucsanphamcha','trungbinh','danhgia_count'));
    }

    public function sanPhamGioHang(){

        return view('frontend.giohang.giohang');

    }
    public function loadDanhGia(Request $request){
        $data = $request->all();
        $danhgia = DanhGia::where('MaSanPham', $data['masanpham'])
            ->where('TrangThai', 1)
            ->get();
        $tongdanhgia = $danhgia->sum('DanhGia'); // Tổng số sao
        $trungbinh = $danhgia->count() > 0 ? $tongdanhgia / $danhgia->count() : 0;
        return response()->json($danhgia);
    }
    public function themDanhGia(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $danhgia = DanhGia::create([
            'NoiDung'=>$data['noidung'],
            'TenDanhGia'=>$data['hoten'],
            'SoDienThoai'=>$data['sodienthoai'],
            'MaSanPham'=>$data['masanpham'],
            'NgayDanhGia'=>$now,
            'DanhGia'=>$data['danhgia'],
        ]);
        return response()->json([
            'code'=>200
        ]);
    }
}
