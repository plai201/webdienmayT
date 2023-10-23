<?php

namespace App\Http\Controllers;

use App\Models\NhanHang;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class NhanHangController extends Controller
{
    use ImageTrait;
    private $nhanhang;
    public function __construct(NhanHang $nhanhang)
    {
        $this->nhanhang = $nhanhang;
    }

    public function trangChu(){
        $nhanhang= $this->nhanhang->latest()->paginate(5);
        if($key= \request()->key){
            $nhanhang =$this->nhanhang->orderBy('created_at','DESC')->where('TenNhanHang', 'LIKE', '%'.$key.'%')->paginate(5);
        }
        return view('admin.nhanhang.trangChu',compact('nhanhang'));
    }

    public function them(){
        return view('admin.nhanhang.them');
    }
    public function themNhanHang(Request $request){
        $datanhanhang=[
            'TenNhanHang' => $request->TenNhanHang,
        ];
        $dataUpLoad = $this->traitUpLoadImg($request,'AnhNhanHang','nhanhang');
        if(!empty($dataUpLoad)){
            $datanhanhang['AnhNhanHang'] = $dataUpLoad['file_path'];
            $datanhanhang['TenAnh'] = $dataUpLoad['file_name'];
        }
        $this->nhanhang->create($datanhanhang);
        return redirect()->route('nhan-hang.trangChu');
    }
    public function sua($maNhanHang){
        $nhanhang = $this->nhanhang->find($maNhanHang);
        return view('admin.nhanhang.sua',compact('nhanhang'));
    }
    public function capNhap(Request $request,$maNhanHang){
        $datanhanhang=[
            'TenNhanHang' => $request->TenNhanHang,
        ];
        $dataUpLoad = $this->traitUpLoadImg($request,'AnhNhanHang','nhanhang');
        if(!empty($dataUpLoad)){
            $datanhanhang['AnhNhanHang'] = $dataUpLoad['file_path'];
            $datanhanhang['TenAnh'] = $dataUpLoad['file_name'];
        }

        $this->nhanhang->find($maNhanHang)->update($datanhanhang);
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
    public function search(Request $request){
        $data = $request->all();
        if($data['key']){
            $nhanhang =$this->nhanhang->where('TenNhanHang', 'LIKE', '%'.$data['key'].'%')->get();
            $output ='
            <ul class="dropdown-menu " style="display: block; position: relative; cursor: pointer;">';
            foreach ($nhanhang as $nh){
                $output .= '<li class="auto-complete">  '.$nh->TenNhanHang.'  </li>';
            }
            $output .='</ul>';
            return $output;
        }

    }
}
