<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\DanhGia;
use App\Models\DanhMucSanPham;
use App\Models\DoanhSo;
use App\Models\DonHang;
use App\Models\KhachHang;
 use App\Models\SanPham;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use View;
use Carbon\Carbon;
class AdminController extends Controller
{
    private $user;
    private $role;
    private $khachhang;
    public function __construct(User $user,VaiTro $role,KhachHang $khachhang )
    {
        $this->user = $user;
        $this->role = $role;
        $this->khachhang = $khachhang;
        $danhmuc = DanhMucSanPham::where('DanhMucCha',0)->get();
        View::share('danhmuc', $danhmuc);

    }

    public function loginAdmin(){
//        if (auth()->check()) {
//            return redirect()->to('home');
//        }
        return view('login');
    }
    public function home(){
        return view('home');
    }
    public function postLoginAdmin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';


        if (Auth::attempt([$field => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->vaitro->contains('TenVaiTro','guest')) {
                return redirect()->route('trang-chu');
            } else{
                return redirect()->route('thong-ke.trangchu');
            }
        }
        return redirect()->route('login')->with('error', 'Sai mật khẩu hoặc tài khoản.');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/trang-chu');
    }
    public function trangChu(){
        $users = $this->user->whereDoesntHave('vaitro', function ($query) {
            $query->where('TenVaiTro', 'guest');
        })->get();

        if($key= \request()->key){
            $users =$this->user->whereDoesntHave('vaitro', function ($query) {
                $query->where('TenVaiTro', 'guest');
            })->orderBy('created_at','DESC')->where('name', 'LIKE', '%'.$key.'%')->get();
        }
        return view('admin.user.trangchu',compact('users'));
    }
    public function them(){
        $roles = $this->role->all();
        return view('admin.user.them',compact('roles'));
    }
    public function themTaiKhoan(UserRequest $request){
        try {
            DB::beginTransaction();
            $user =  $this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $roleIds = $request->MaVaiTro;
            $user->vaitro()->attach($roleIds);
            DB::commit();

            return redirect()->route('users.trangChu');
        }
        catch (Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }

    }

    public function suaTaiKhoan($mataikhoan){
        $roles = $this->role->all();
        $users = $this->user->find($mataikhoan);
        $roleOfuser  = $users->vaitro;
        return view('admin.user.sua',compact('roles','roleOfuser','users'));
    }
    public function capNhapTaiKhoan(Request $request,$mataikhoan){
        try {
            DB::beginTransaction();
            $this->user->find($mataikhoan)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $user= $this->user->find($mataikhoan);

            $user->vaitro()->sync($request->MaVaiTro);
            DB::commit();

            return redirect()->route('users.trangChu');
        }
        catch (Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }
    }
    public function search(Request $request){
        $data = $request->all();
        if($data['key']){
            $user =$this->user->whereDoesntHave('vaitro', function ($query) {
                $query->where('TenVaiTro', 'guest');
            })->where('name', 'LIKE', '%'.$data['key'].'%')->get();
            $output ='
            <ul class="dropdown-menu " style="display: block; position: relative; cursor: pointer;">';
            foreach ($user as $nh){
                $output .= '<li class="auto-complete">  '.$nh->name.'  </li>';
            }
            $output .='</ul>';
            return $output;
        }

    }
    public function xoa($mataikhoan){
        try {
            $this->user->find($mataikhoan)->delete();
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
    public function danhSachDaXoa(){
        $danhsachdaxoa = $this->user->onlyTrashed()->get();
        return view('admin.user.danhsachdaxoa',compact('danhsachdaxoa'));
    }

    public function khoiPhuc($mataikhoan){
        $user = $this->user::withTrashed()->find($mataikhoan);
        if ($user) {
            $user->restore();
            return redirect()->route('user.danh-sach-da-xoa');
        }

    }
    public function xoaVinhVien($mataikhoan){
        try {
            $user = $this->user::withTrashed()->find($mataikhoan);
            if ($user) {
                $user->forceDelete();
                return response()->json([
                    'code'=>200,
                    'message'=>'success'
                ],200);
            }

        }catch (Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
    public function thongke(Request $request ){
//        $user_id_address = $request->ip();
//        $nguoitruycap_current = QLTruyCap::where('DiaChiIP',$user_id_address)->get();
//        $nguoitruycap_count = $nguoitruycap_current->count();
//        if($nguoitruycap_count<1){
//            $nguoitruycapadd = QLTruyCap::create([
//                'DiaChiIP' =>$user_id_address,
//                'NgayTruyCap' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
//            ]);
//        }
//        $nguoitruycap = QLTruyCap::all();
//        $nguoitruycap_tong = $nguoitruycap->count();


        $sanpham = SanPham::all()->count();
        $donhang = DonHang::all()->count();
        $khachhang = KhachHang::all()->count();

        $sanpham_view = SanPham::orderBy('LuotXem', 'DESC')->take(10)->get();
        $sanpham_sale = SanPham::orderBy('SanPhamBan','DESC')->take(10)->get();


         return view('admin.thongke.thongke',compact('sanpham','donhang','khachhang','sanpham_view','sanpham_sale'));
    }
     public function thongKeByDay(Request $request){
        $chart_data = [];

        $get =DoanhSo::whereBetween('NgayDonHang',[$request->ngay1,$request->ngay2])->orderBy('NgayDonHang','ASC')->get();
        if($get){
            foreach ($get as $key => $value){
                $chart_data[] = array(
                    'NgayDonHang'=> $value->NgayDonHang,
                    'TongDonHang'=> $value->TongDonHang,
                    'DoanhThu'=> $value->DoanhThu,
                    'LoiNhuan'=> $value->LoiNhuan,
                    'SoLuong'=> $value->SoLuong,
                );
            }
            echo $data = json_encode($chart_data);
        }
     }
    public function thongKeChon(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-T H:i:s') ;
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $chart_data = [];
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $todayStart = Carbon::now('Asia/Ho_Chi_Minh')->startOfDay()->toDateString();
        $todayEnd = Carbon::now('Asia/Ho_Chi_Minh')->endOfDay()->toDateString();
        if($data['val']=='1ngay'){
            $get = DoanhSo::whereBetween('NgayDonHang', [$todayStart , $todayEnd])->orderBy('NgayDonHang', 'ASC')->get();
        }elseif($data['val']=='7ngay'){
            $get = DoanhSo::whereBetween('NgayDonHang', [$sub7days , $now])->orderBy('NgayDonHang', 'ASC')->get();
        }elseif($data['val']=='1thangnay'){
            $get = DoanhSo::whereBetween('NgayDonHang', [$dauthangnay , $now])->orderBy('NgayDonHang', 'ASC')->get();

        }elseif($data['val']=='1thangtruoc'){
            $get = DoanhSo::whereBetween('NgayDonHang', [$dauthangtruoc , $cuoithangtruoc])->orderBy('NgayDonHang', 'ASC')->get();

        }elseif($data['val']=='1nam'){
            $get = DoanhSo::whereBetween('NgayDonHang', [$sub365days , $now])->orderBy('NgayDonHang', 'ASC')->get();
        }


        if ($get) {
            foreach ($get as $key => $value) {
                $chart_data[] = array(
                    'NgayDonHang'=> $value->NgayDonHang,
                    'TongDonHang'=> $value->TongDonHang,
                    'DoanhThu'=> $value->DoanhThu,
                    'LoiNhuan'=> $value->LoiNhuan,
                    'SoLuong'=> $value->SoLuong,
                );
            }
            echo $data = json_encode($chart_data);
        }
    }
    public function thongKeChonLoad(Request $request)
    {
        $chart_data = [];
         $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DoanhSo::whereBetween('NgayDonHang', [$sub365days , $now])->orderBy('NgayDonHang', 'ASC')->get();


        if ($get) {
            foreach ($get as $key => $value) {
                $chart_data[] = array(
                    'NgayDonHang'=> $value->NgayDonHang,
                    'TongDonHang'=> $value->TongDonHang,
                    'DoanhThu'=> $value->DoanhThu,
                    'LoiNhuan'=> $value->LoiNhuan,
                    'SoLuong'=> $value->SoLuong,
                );
            }
            echo $data = json_encode($chart_data);
        }
    }

    //quan ly danh gia
    public function qlDanhGia(){
        $masanpham = [];
        $danhgia = DanhGia::all();
         foreach ($danhgia as $dg){
             $masp = $dg->MaSanPham;
             $masanpham[] = $masp;

         }
        $sanphams = SanPham::whereIn('MaSanPham', $masanpham)->get();


        return view('admin.danhgia.trangchu',compact('danhgia','sanphams'));
    }
    public function qlDanhGiaXem($masanpham){
        $danhgia = DanhGia::where('MaSanPham',$masanpham)->orderBy('DanhGia','DESC') ->get();
        $sanpham = SanPham::find($masanpham);


        return view('admin.danhgia.xem',compact('danhgia','sanpham'));
    }
    public function qlDanhGiaCapNhap(Request $request,$madanhgia){
        $data = $request->all();
        $danhgia = DanhGia::find($madanhgia)->update([
            'TrangThai'=>$data['key']
        ]);

    }
    public function trangChuKhachHang(){
        $khachhang = $this->khachhang->all();
        return view('admin.khachhang.trangchu',compact('khachhang'));
    }
    public function suaKhachHang($id){
        $khachhang = $this->khachhang->find($id);
        return view('admin.khachhang.sua',compact('khachhang'));
    }


}
