<?php

namespace App\Http\Controllers;

use App\Models\DanhMucSanPham;
use App\Models\DonHang;
use App\Models\DonHangChiTiet;
use App\Models\GiaoHang;
use App\Models\KhachHang;
use App\Traits\DiaChiTrait;
use Illuminate\Http\Request;
use View;
class TrangCaNhanController extends Controller
{
    use DiaChiTrait;
    public function __construct()
    {
        $danhmuc = DanhMucSanPham::where('DanhMucCha',0)->get();
        View::share('danhmuc', $danhmuc);
    }
    public function trangchu(){
        if(auth()->check()){
            $mataikhoan = auth()->user()->MaTaiKhoan;
            if($khachhang = KhachHang::where('MaTaiKhoan',$mataikhoan)->first()){
                $giaohang = GiaoHang::where('MaKhachHang',$khachhang->MaKhachHang)->get();
                $thanhpho = $this->getThanhPho();
                if($donhang=DonHang::where('MaKhachHang',$khachhang->MaKhachHang)->latest('created_at')->get()){
                    $donhangchitietList = [];
                    foreach ($donhang as $key => $dh){
                      $donhangchitiet = DonHangChiTiet::where('MaDatDon',$dh->MaDatDon)->get();
                      $donhangchitietList[$dh->MaDatDon] = $donhangchitiet;
                    }

                    return view('frontend.trangcanhan.trangchu',compact('khachhang','giaohang','thanhpho','donhangchitietList','donhang'));

                }
                return view('frontend.trangcanhan.trangchu',compact('khachhang','giaohang','thanhpho'));
            }
        }

    }
    public function thongTinKH($id){

    }
    public function capNhapThongTinKH(Request $request,$id){
        $data = $request->all();
        $hovaten = explode(' ', $data['hovaten']);
        $ten = array_pop($hovaten);  // Lấy phần cuối cùng làm first name
        $ho = implode(' ', $hovaten); // Nối các phần còn lại làm last name
        $giaohang = KhachHang::find($id)->update([
            'Ho'=>$ho,
            'Ten'=>$ten,
            'SoDienThoai'=>$data['sodienthoai'],
            'GioiTinh'=>$data['gioitinh'],
            'NgaySinh'=>$data['ngaysinh'],
            'Email'=>$data['email'],
            'ThanhPhoTinh'=>$data['thanhpho'],
            'QuanHuyen'=>$data['quanhuyen'],
            'PhuongXa'=>$data['phuongxa'],
            'DiaChi'=>$data['diachi'],
        ]);
        return response()->json([
                'code'=>200,
                'data'=> 'Cập nhập thông tin thành công!'
        ]
        );
    }
}
