<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucRequest;
use App\Models\ThongSoKyThuat;
use Illuminate\Http\Request;
use App\Components\DanhMucChaCon;
use App\Traits\ImageTrait;
use App\Models\DanhMucSanPham;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class DanhMucSanPhamController extends Controller
{
    use ImageTrait;

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
        if($key= \request()->key){
            $danhmucsanpham =$this->ds->orderBy('created_at','DESC')->where('TenDanhMuc', 'LIKE', '%'.$key.'%')->paginate(5);
        }
        return view('admin.danhmucsanpham.trangChu',compact('danhmucsanpham'));
    }

    public function themDanhMuc(DanhMucRequest $request){
        $datadanhmuc=[
            'TenDanhMuc' => $request->TenDanhMuc,
            'DanhMucCha' => $request->DanhMucCha,

        ];
        $dataUpLoad = $this->traitUpLoadImg($request,'AnhDanhMuc','danhmuc');

        if(!empty($dataUpLoad)){
            $datadanhmuc['AnhDanhMuc'] = $dataUpLoad['file_path'];
            $datadanhmuc['TenAnh'] = $dataUpLoad['file_name'];
        }

       $danhmucsanpham = $this->ds->create($datadanhmuc);
        if($tenthongso = $request->TenThongSo){
            foreach ($tenthongso as $item){
                $thongso = $this->thongso->firstOrCreate([
                    'TenThongSo'=>$item,
                ]);
                $ma[] = $thongso->MaThongSo;
            }
            $danhmucsanpham->danhmucthongso()->sync($ma);
        }

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
        $datadanhmuc=[
            'TenDanhMuc' => $request->TenDanhMuc,
            'DanhMucCha' => $request->DanhMucCha,

        ];
        $dataUpLoad = $this->traitUpLoadImg($request,'AnhDanhMuc','danhmuc');

        if(!empty($dataUpLoad)){
            $datadanhmuc['AnhDanhMuc'] = $dataUpLoad['file_path'];
            $datadanhmuc['TenAnh'] = $dataUpLoad['file_name'];
        }

        $this->ds->find($maDanhMuc)->update($datadanhmuc);

        $danhmucsanpham= $this->ds->find($maDanhMuc);
         if($tenthongso = $request->TenThongSo){
             foreach ($tenthongso as $item){
                 $thongso = $this->thongso->firstOrCreate([
                     'TenThongSo'=>$item,
                 ]);
                 $ma[] = $thongso->MaThongSo;
             }
             $danhmucsanpham->danhmucthongso()->sync($ma);
         }
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
    public function search(Request $request){
        $data = $request->all();
        if($data['key']){
            $dm =$this->ds->where('TenDanhMuc', 'LIKE', '%'.$data['key'].'%')->get();
            $output ='
            <ul class="dropdown-menu " style="display: block; position: relative; cursor: pointer;">';
            foreach ($dm as $sp){
                $output .= '<li class="auto-complete">  '.$sp->TenDanhMuc.'  </li>';
            }
            $output .='</ul>';
            return $output;
        }

    }
}
