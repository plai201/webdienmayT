<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\DanhMucSanPham;
use App\Models\KhachHang;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use View;
class LoginController extends Controller
{
    private $user;
    private $role;
    private $khachhang;
    public function __construct(User $user,VaiTro $role,KhachHang $khachhang)
    {
        $this->user = $user;
        $this->role = $role;
        $this->khachhang = $khachhang;
        $danhmuc = DanhMucSanPham::where('DanhMucCha',0)->get();
        View::share('danhmuc', $danhmuc);
    }
    public function themTaiKhoanKhach(Request $request){
        try {
            DB::beginTransaction();
            $user =  $this->user->create([
                'name'=>$request->hovaten,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $mataikhoan = $user->MaTaiKhoan;

            $guestRole = $this->role->where('TenVaiTro', 'guest')->first();
            $user->vaitro()->attach($guestRole->MaVaiTro);

            $hovaten = explode(' ', $request->hovaten);
            $ten = array_pop($hovaten);  // Lấy phần cuối cùng làm first name
            $ho = implode(' ', $hovaten); // Nối các phần còn lại làm last name
            $khachhang = $this->khachhang->create([
                'Ho'=>$ho,
                'Ten'=>$ten,
                'SoDienThoai'=>$request->sodienthoai,
                'Email'=>$request->email,
                'MaTaiKhoan'=>$mataikhoan,
            ]);

            DB::commit();

            return redirect('/trang-chu');
        }
        catch (Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }

    }
}
