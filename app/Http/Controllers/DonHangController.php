<?php

namespace App\Http\Controllers;

use App\Models\DoanhSo;
use App\Models\DonHang;
use App\Models\DonHangChiTiet;
use App\Models\GiaoHang;
use App\Models\KhachHang;
use App\Models\KhuyenMai;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    private $donhang;
    private $donhangchitiet;
    private $giaohang;
    private $khachhang;
    private $khuyenmai;
    public function __construct(DonHang $donhang,DonHangChiTiet $donhangchitiet, GiaoHang $giaohang, KhachHang $khachhang, KhuyenMai $khuyenmai)
    {
        $this->donhang = $donhang;
        $this->donhangchitiet = $donhangchitiet;
        $this->giaohang = $giaohang;
        $this->khachhang = $khachhang;
        $this->khuyenmai = $khuyenmai;
    }
    public function trangchu(){
        $donhang = $this->donhang->latest()->paginate(5);
        return view('admin.donhang.trangchu',compact('donhang'));
    }
    public function xemDonHang($madatdon){
        $donhangchitiet = $this->donhangchitiet->where('MaDatDon',$madatdon)->get();
        $donhang = $this->donhang->where('MaDatDon',$madatdon)->get();
        foreach ($donhang as $key => $dh){
            $makhachhang = $dh->MaKhachHang;
            $magiaohang = $dh->MaGiaoHang;
        }
        foreach ($donhangchitiet as $key => $dhct){
            $makhuyenmai = $dhct->MaKhuyenMai;
        }
        $khachhang = $this->khachhang->find($makhachhang);
        $giaohang = $this->giaohang->find($magiaohang);
        $khuyenmai = $this->khuyenmai->find($makhuyenmai);
        return view('admin.donhang.xem',compact('donhang','donhangchitiet','giaohang','khachhang','khuyenmai'));
    }
    public function capNhap(Request $request,$madatdon){
        $data = $request->all();
        $donhang = $this->donhang->where('MaDatDon',$madatdon)->first();
        $donhang->update([
            'TrangThai' => $request->trangthai
        ]);

        $ngaydonhang = $donhang->NgayDonHang;
         $doanhso = DoanhSo::where('NgayDonHang',$ngaydonhang)->get();
        if ($doanhso){
            $doanhso_count = $doanhso->count();
        }else{
            $doanhso_count = 0;
        }
        if($donhang->TrangThai ==2) {
            $tongdonhang = 0;
            $doanhthu = 0;
            $loinhuan = 0;
            $soluong = 0;
            foreach ($data['masanpham'] as $key => $masanpham) {
                $sannpham = SanPham::find($masanpham);
                $sannpham_soluong = $sannpham->SanPhamSoLuong;
                $sannpham_ban = $sannpham->SanPhamBan;

                $giasanpham = $sannpham->GiaBan;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                foreach ($data['soluong'] as $key2 => $sl) {
                    if ($key2 == $key) {
                        $pro_remain = $sannpham_soluong - $sl;
                        $sannpham->update([
                            'SanPhamSoLuong' => $pro_remain,
                            'SanPhamBan' => $sannpham_ban + $sl
                        ]);
                        $soluong += $sl;
                        $tongdonhang += 1;
                        $doanhthu += $giasanpham * $sl;
                        $loinhuan = ($giasanpham - ($giasanpham-500000))* $sl; //(Giá bán - Giá vốn) * Số lượng
                    }
                }

            }
            if ($doanhso_count > 0) {
                $doanhso_capnhap = DoanhSo::where('NgayDonHang', $ngaydonhang)->first();
                $doanhso_capnhap->update([
                    'DoanhThu' => $doanhso_capnhap->DoanhThu + $doanhthu,
                    'LoiNhuan' => $doanhso_capnhap->LoiNhuan + $loinhuan,
                    'SoLuong' => $doanhso_capnhap->SoLuong + $soluong,
                    'TongDonHang' => $doanhso_capnhap->TongDonHang + $tongdonhang,
                ]);
            } else {
                $doanhso_new = DoanhSo::create([
                    'DoanhThu' =>  $doanhthu,
                    'LoiNhuan' =>  $loinhuan,
                    'SoLuong' =>   $soluong,
                    'TongDonHang' =>   $tongdonhang,
                    'NgayDonHang' => $ngaydonhang
                ]);

            }

        }
        return response()->json(['code'=>200]);
    }
}
