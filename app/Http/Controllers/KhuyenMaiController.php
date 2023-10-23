<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class KhuyenMaiController extends Controller
{

    public function trangchu(){
        $khuyenmai = KhuyenMai::latest()->get();
        return view('admin.khuyenmai.trangchu',compact('khuyenmai'));
    }
    public function them(){
        return view('admin.khuyenmai.them');
    }
    public function themMa(Request $request){

        $khuyenmai = KhuyenMai::create([
            'TenKhuyenMai' => $request->TenKhuyenMai,
            'Ma' => $request->Ma,
            'SoLuong' => $request->SoLuong,
            'TinhNangMa' => $request->TinhNangMa,
            'GiaTri' => $request->GiaTri,
            'MaTaiKhoan'=>auth()->id()
        ]);
        return redirect()->route('khuyen-mai.trangchu');
    }
    public function sua($makhuyenmai){
        $khuyenmai =  KhuyenMai::find($makhuyenmai);
        return view('admin.khuyenmai.sua',compact('khuyenmai'));
    }
    public function capNhap(Request $request,$makhuyenmai){

    $khuyenmai = KhuyenMai::find($makhuyenmai)->update([
        'TenKhuyenMai' => $request->TenKhuyenMai,
        'Ma' => $request->Ma,
        'SoLuong' => $request->SoLuong,
        'TinhNangMa' => $request->TinhNangMa,
        'GiaTri' => $request->GiaTri,
        'MaTaiKhoan'=>auth()->id()
    ]);
    return redirect()->route('khuyen-mai.trangchu');
}
    public function xoa($MaKhuyenMai){
        try {
            KhuyenMai::find($MaKhuyenMai)->delete();
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
}
