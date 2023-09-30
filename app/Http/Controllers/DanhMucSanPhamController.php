<?php

namespace App\Http\Controllers;

use App\Models\ThongSoKyThuat;
use Illuminate\Http\Request;
use App\Components\DanhMucChaCon;
use App\Models\DanhMucSanPham;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class DanhMucSanPhamController extends Controller
{
    private $ds;
    private $thongso;
    private $danhmucthongso;
    public function __construct(DanhMucSanPham $ds,ThongSoKyThuat $thongso)
    {
        $this->ds = $ds;
        $this->thongso = $thongso;
    }

    public function them(){
        $DanhMucChaCon = new DanhMucChaCon($this->ds->all());
        $thongso = $this->thongso->all();
        $htmlOption = $DanhMucChaCon->DanhMucSanPhamChaCon($danhMucCha='');

        return view('admin.danhmucsanpham.them',compact('htmlOption','thongso'));
    }

    public function trangChu(){
        $danhmucsanpham= $this->ds->latest()->paginate(5);
        return view('admin.danhmucsanpham.trangChu',compact('danhmucsanpham'));
    }

    public function themDanhMuc(Request $request){
       $danhmucsanpham = $this->ds->create([
            'TenDanhMuc' => $request->TenDanhMuc,
            'DanhMucCha' => $request->DanhMucCha
        ]);
        $tenthongso = $request->TenThongSo;
        foreach ($tenthongso as $item){
            $thongso = $this->thongso->firstOrCreate([
                'TenThongSo'=>$item,
            ]);
            $ma[] = $thongso->MaThongSo;
        }
        $danhmucsanpham->danhmucthongso()->sync($ma);
        return redirect()->route('danh-muc-san-pham.trangChu');
    }

    public function sua($maDanhMuc){
        $danhmucsanpham = $this->ds->find($maDanhMuc);
        $DanhMucChaCon = new DanhMucChaCon($this->ds->all());
        $htmlOption = $DanhMucChaCon->DanhMucSanPhamChaCon($danhmucsanpham->DanhMucCha);
        $thongso = $this->thongso->all();
        $notSelectedThongSo = ThongSoKyThuat::whereDoesntHave('danhmucsanphams')->get();


        return view('admin.danhmucsanpham.sua',compact('danhmucsanpham','htmlOption','thongso','notSelectedThongSo'));
    }
    public function capNhap(Request $request,$maDanhMuc){
        $this->ds->find($maDanhMuc)->update([
            'TenDanhMuc' => $request->TenDanhMuc,
            'DanhMucCha' => $request->DanhMucCha
        ]);
        $danhmucsanpham= $this->ds->find($maDanhMuc);
        $tenthongso = $request->TenThongSo;
        foreach ($tenthongso as $item){
            $thongso = $this->thongso->firstOrCreate([
                'TenThongSo'=>$item,
            ]);
            $ma[] = $thongso->MaThongSo;
        }
        $danhmucsanpham->danhmucthongso()->sync($ma);
        return redirect()->route('danh-muc-san-pham.trangChu');
    }

    public function xoa($maDanhMuc){
        $this->ds->find($maDanhMuc)->delete();
        return redirect()->route('danh-muc-san-pham.trangChu');

    }

    public function danhSachDaXoa(){
        $danhSachDaXoa = $this->ds->onlyTrashed()->get();
        return view('admin.danhmucsanpham.danhSachDaXoa',compact('danhSachDaXoa'));
    }

    public function khoiPhuc($maDanhMuc){
        $danhMuc = $this->ds::withTrashed()->find($maDanhMuc);
        if ($danhMuc) {
            $danhMuc->restore();
        }
        return redirect()->route('danh-muc-san-pham.danh-sach-da-xoa');
    }
    public function xoaVinhVien($maDanhMuc){
        $danhMuc = $this->ds::withTrashed()->find($maDanhMuc);

        if ($danhMuc) {
            $danhMuc->forceDelete();
        }
        return redirect()->route('danh-muc-san-pham.danh-sach-da-xoa');
    }
}
