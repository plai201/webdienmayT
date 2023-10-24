<?php

namespace App\Http\Controllers;

use App\Models\DanhMucSanPham;
use App\Models\DonHang;
use App\Models\DonHangChiTiet;
use App\Models\GiaoHang;
use App\Models\KhachHang;
use App\Models\KhuyenMai;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Session;
use mysql_xdevapi\Exception;
use View;
class GioHangController extends Controller
{
    private $giaohang;
    private $donhang;
    private $donhangchitiet;
    private $khachhang;
    private $khuyenmai;
    public function __construct(GiaoHang $giaohang,DonHang $donhang, DonHangChiTiet $donhangchitiet,KhachHang $khachhang,KhuyenMai $khuyenmai)
    {
        $this->giaohang = $giaohang;
        $this->donhang = $donhang;
        $this->donhangchitiet = $donhangchitiet;
        $this->khachhang = $khachhang;
        $this->khuyenmai = $khuyenmai;
        $danhmuc = DanhMucSanPham::where('DanhMucCha',0)->get();
        View::share('danhmuc', $danhmuc);
    }
    public function trangChu(){

        if( $user = auth()->user()){
            $mataikhoan = $user->MaTaiKhoan;
            if ($khachhang = $this->khachhang->where('MaTaiKhoan', $mataikhoan)->first()){
                $giaohang = $this->giaohang->where('MaKhachHang', $khachhang->MaKhachHang)->get();
                $thanhpho = DB::table('tinh_thanh_pho')->get();
                return view('frontend.giohang.giohang',compact('thanhpho','giaohang'));
            }
            else{
                $thanhpho = DB::table('tinh_thanh_pho')->get();
                return view('frontend.giohang.giohang',compact('thanhpho'));
            }
        }else{
            $thanhpho = DB::table('tinh_thanh_pho')->get();
            return view('frontend.giohang.giohang',compact('thanhpho'));
        }

    }
    public function getThanhPho(){
        $thanhpho = DB::table('tinh_thanh_pho')->get();
        return view('frontend.giohang.giohang',compact('thanhpho'));
    }
    public function getQuanHuyen(Request $request)
    {
        $quanhuyen = DB::table('quan_huyen')
            ->where('matp', $request->MaThanhPho)
            ->get();

        if (count($quanhuyen) > 0) {
            return response()->json($quanhuyen);
        }
    }

    public function getPhuongXa(Request $request)
    {
        $phuongxa = DB::table('phuong_xa')
            ->where('maqh', $request->MaQuanHuyen)
            ->get();

        if (count($phuongxa) > 0) {
            return response()->json($phuongxa);
        }
    }
    public function themSanPhamGioHang($masanpham){
        $sanphamgiohang = SanPham::findOrFail($masanpham);
        $giohang = session()->get('giohang',[]);
        if(isset($giohang[$masanpham])){
            $giohang[$masanpham]['SoLuong']++;
        }else{
            $giohang[$masanpham]=[
                'MaSanPham'=> $sanphamgiohang->MaSanPham,
                'TenSanPham'=> $sanphamgiohang->TenSanPham,
                'SoLuong'=> 1,
                'GiaBan'=> $sanphamgiohang->GiaBan,
                'GiaGoc'=> $sanphamgiohang->GiaGoc,
                'GiamGia'=> $sanphamgiohang->GiamGia,
                'AnhSanPham'=> $sanphamgiohang->AnhSanPham,
            ];
        }
        session()->put('giohang',$giohang);
        return redirect()->back()->with('success','Thêm sản phẩm thành công');
    }
    public function themSanPhamGioHangLive($masanpham){
        $sanphamgiohang = SanPham::findOrFail($masanpham);
        $giohang = session()->get('giohang',[]);
        if(isset($giohang[$masanpham])){
            $giohang[$masanpham]['SoLuong']++;
        }else{
            $giohang[$masanpham]=[
                'MaSanPham'=> $sanphamgiohang->MaSanPham,
                'TenSanPham'=> $sanphamgiohang->TenSanPham,
                'SoLuong'=> 1,
                'GiaBan'=> $sanphamgiohang->GiaBan,
                'GiaGoc'=> $sanphamgiohang->GiaGoc,
                'GiamGia'=> $sanphamgiohang->GiamGia,
                'AnhSanPham'=> $sanphamgiohang->AnhSanPham,
            ];
        }
        session()->put('giohang',$giohang);
        return redirect()->route('gio-hang');
    }
    public function updateCart(Request $request)
    {
        // Lấy dữ liệu từ yêu cầu AJAX
        if ($request->product_id && $request->quantity){


            $cart = session()->get('giohang');
            $cart[$request->product_id]['SoLuong'] = $request->quantity;

            // Lưu giỏ hàng đã cập nhật vào session
            session()->put('giohang', $cart);

            // Trả về kết quả hoặc redirect tùy vào logic của bạn
            return response()->json(['success' => true, 'message' => 'Giỏ hàng đã được cập nhật']);
        }

    }
    public function xoaGioHang(Request $request){
        if ($request->id ){
            $cart = session()->get('giohang');
                unset($cart[$request->id]);
                session()->put('giohang', $cart);
                return response()->json([
                    'code'=>200,
                    'message'=>'success'
                ],200);
        }
    }
    public function checkOut(Request $request){
        try {
            DB::beginTransaction();
            $data = $request->all(); //lay data tu ajax

            $hovaten = explode(' ', $data['hoten']);
            $ten = array_pop($hovaten);  // Lấy phần cuối cùng làm first name
            $ho = implode(' ', $hovaten); // Nối các phần còn lại làm last name
            $giaohang = $this->giaohang->create([
                'Ho'=>$ho,
                'Ten'=>$ten,
                'SoDienThoai'=>$data['sodienthoai'],
                'Email'=>$data['email'],
                'ThanhPhoTinh'=>$data['thanhpho'],
                'QuanHuyen'=>$data['quanhuyen'],
                'PhuongXa'=>$data['phuongxa'],
                'DiaChi'=>$data['diachi'],
                'ThanhToan'=>$data['thanhtoan'],
                'GhiChu'=>$data['ghichu'],
            ]);
            $magiaohang = $giaohang->MaGiaoHang;


            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $madatdon = substr(md5(microtime()),rand(0,26),5); //ramdon ma dat don
            $donhang = $this->donhang->create([
                'MaGiaoHang'=>$magiaohang,
                'MaDatDon'=>$madatdon,
                'TrangThai'=>1,
                'NgayDonHang'=>$now
            ]);
            if(count(session('giohang')) > 0){
                foreach(session('giohang') as $id => $item){
                    $donhangchitiet = $this->donhangchitiet->create([
                       'MaSanPham'=>$item['MaSanPham'],
                       'TenSanPham'=>$item['TenSanPham'],
                       'SoLuong'=>$item['SoLuong'],
                       'GiaBan'=>$item['GiaBan'],
                       'GiaGoc'=>$item['GiaGoc'],
                       'GiamGia'=>$item['GiamGia'],
                       'MaDatDon'=>$madatdon,
                       'MaKhuyenMai'=>$data['makhuyenmai'],

                    ]);
                }
            }

            //gửi mail xác nhận
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-T H:i:s');




            $request->session()->forget('giohang');
            $request->session()->forget('khuyenmai');
            DB::commit();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        }catch (Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    public function themDiaChi(Request $request){
        $user = auth()->user();
        $mataikhoan = $user->MaTaiKhoan;
        $khachhang = $this->khachhang->where('MaTaiKhoan', $mataikhoan)->first();
        $makhachhang = $khachhang->MaKhachHang;
        $data = $request->all();
        $hovaten = explode(' ', $data['hovaten']);
        $ten = array_pop($hovaten);  // Lấy phần cuối cùng làm first name
        $ho = implode(' ', $hovaten); // Nối các phần còn lại làm last name
        $giaohang = $this->giaohang->create([
            'Ho'=>$ho,
            'Ten'=>$ten,
            'SoDienThoai'=>$data['sodienthoai'],
            'ThanhPhoTinh'=>$data['thanhphotinh'],
            'QuanHuyen'=>$data['quanhuyen'],
            'PhuongXa'=>$data['phuongxa'],
            'DiaChi'=>$data['diachi'],
            'MaKhachHang'=>$makhachhang
        ]);
        return redirect()->route('gio-hang');
    }
    public function suaDiaChi($id){
        $giaohang = $this->giaohang->find($id);
        return response()->json([
            'data'=>$giaohang
        ],200);

    }
    public function capNhapDiaChi(Request $request,$id){
        $user = auth()->user();
        $mataikhoan = $user->MaTaiKhoan;
        $khachhang = $this->khachhang->where('MaTaiKhoan', $mataikhoan)->first();
        $makhachhang = $khachhang->MaKhachHang;
        $data = $request->all();
        $hovaten = explode(' ', $data['HoVaTen']);
        $ten = array_pop($hovaten);  // Lấy phần cuối cùng làm first name
        $ho = implode(' ', $hovaten); // Nối các phần còn lại làm last name
        $giaohang = $this->giaohang->find($id)->update([
            'Ho'=>$ho,
            'Ten'=>$ten,
            'SoDienThoai'=>$data['SoDienThoai'],
            'ThanhPhoTinh'=>$data['ThanhPhoTinh'],
            'QuanHuyen'=>$data['QuanHuyen'],
            'PhuongXa'=>$data['PhuongXa'],
            'DiaChi'=>$data['DiaChi'],
            'MaKhachHang'=>$makhachhang
        ]);
        return response()->json([
            'code'=>200,
            'message'=>'success'
        ],200);
    }
    public function xoaDiaChi($id){
        try {
            $giaohang = $this->giaohang->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);


        }catch (Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
    public function checkOuted(Request $request){
        try {
            DB::beginTransaction();
            $data = $request->all();
            $user = auth()->user();
            $mataikhoan = $user->MaTaiKhoan;
            $khachhang = $this->khachhang->where('MaTaiKhoan', $mataikhoan)->first();
            $makhachhang = $khachhang->MaKhachHang;
            $magiaohang = $data['magiaohang'];
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();



            $this->giaohang->find($magiaohang)->update([
                'ThanhToan'=>$data['thanhtoan'],
                'GhiChu'=>$data['ghichu'],
            ]);
            $madatdon = substr(md5(microtime()),rand(0,26),5); //ramdon ma dat don
            $donhang = $this->donhang->create([
                'MaGiaoHang'=>$magiaohang,
                'MaDatDon'=>$madatdon,
                'TrangThai'=>1,
                'NgayDonHang'=>$now,
                'MaKhachHang'=>$makhachhang,
            ]);
            if(count(session('giohang')) > 0){
                foreach(session('giohang') as $id => $item){
                    $donhangchitiet = $this->donhangchitiet->create([
                        'MaSanPham'=>$item['MaSanPham'],
                        'TenSanPham'=>$item['TenSanPham'],
                        'SoLuong'=>$item['SoLuong'],
                        'GiaBan'=>$item['GiaBan'],
                        'GiaGoc'=>$item['GiaGoc'],
                        'GiamGia'=>$item['GiamGia'],
                        'MaDatDon'=>$madatdon,
                        'MaKhuyenMai'=>$data['makhuyenmai']
                    ]);
                }
            }
            $request->session()->forget('giohang');
            DB::commit();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        }catch (Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function checkKhuyenMai(Request $request){
        $data = $request->all();
        $khuyenmai = $this->khuyenmai->where('Ma',$data['code'])->first();
        if($khuyenmai){
            $slkhuyenmai = $khuyenmai->count();
            if($slkhuyenmai>0){
                $khuyenmai_session = session()->get('khuyenmai');
                if($khuyenmai_session == true){
                    $is_avaible = 0;
                    if($is_avaible ==0){
                        $cou[] = array(
                            'MaKhuyenMai'=>$khuyenmai->MaKhuyenMai,
                            'Ma'=>$khuyenmai->Ma,
                            'TinhNangMa'=>$khuyenmai->TinhNangMa,
                            'GiaTri'=>$khuyenmai->GiaTri,
                        );
                        session()->put('khuyenmai',$cou);
                    }
                }else{
                    $cou[] = array(
                        'MaKhuyenMai'=>$khuyenmai->MaKhuyenMai,
                        'Ma'=>$khuyenmai->Ma,
                        'TinhNangMa'=>$khuyenmai->TinhNangMa,
                        'GiaTri'=>$khuyenmai->GiaTri,
                    );
                    session()->put('khuyenmai',$cou);
                }
                return response()->json([
                    'code'=>200,
                    'message'=>'Áp dụng mã thành công'
                ],200);
            }
        }else{
            return response()->json([
                'code'=>500,
                'message'=>'Mã giảm giá không đúng!'
            ],200);
        }

    }


}
