<?php

namespace App\Http\Controllers;

use App\Models\NhanHang;
use Illuminate\Http\Request;

class NhanHangController extends Controller
{
    private $nhanhang;
    public function __construct(NhanHang $nhanhang)
    {
        $this->nhanhang = $nhanhang;
    }

    public function trangChu(){
        $nhanhang= $this->nhanhang->latest()->paginate(5);
        return view('admin.nhanhang.trangChu',compact('nhanhang'));
    }

    public function them(){
        return view('admin.nhanhang.them');
    }
    public function themNhanHang(Request $request){
        $this->nhanhang->create([
            'TenNhanHang' => $request->TenNhanHang,
        ]);
        return redirect()->route('nhan-hang.trangChu');
    }
    public function sua($maNhanHang){
        $nhanhang = $this->nhanhang->find($maNhanHang);
        return view('admin.nhanhang.sua',compact('nhanhang'));
    }
    public function capNhap(Request $request,$maNhanHang){
        $this->nhanhang->find($maNhanHang)->update([
            'TenNhanHang' => $request->TenNhanHang
        ]);
        return redirect()->route('nhan-hang.trangChu');
    }

    public function xoa($maNhanHang){
        $this->nhanhang->find($maNhanHang)->delete();
        return redirect()->route('nhan-hang.trangChu');
    }

    public function danhSachDaXoa(){
        $danhSachDaXoa = $this->nhanhang->onlyTrashed()->get();
        return view('admin.nhanhang.danhSachDaXoa',compact('danhSachDaXoa'));
    }

    public function khoiPhuc($maNhanHang){
        $nhanHang = $this->nhanhang::withTrashed()->find($maNhanHang);
        if ($nhanHang) {
            $nhanHang->restore();
        }
        return redirect()->route('nhan-hang.danh-sach-da-xoa');
    }
    public function xoaVinhVien($maNhanHang){
        $nhanHang = $this->nhanhang::withTrashed()->find($maNhanHang);

        if ($nhanHang) {
            $nhanHang->forceDelete();
        }
        return redirect()->route('nhan-hang.danh-sach-da-xoa');
    }
}
