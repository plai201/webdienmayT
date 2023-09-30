<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequest;
use App\Models\AnhSanPham;
use App\Models\DanhMucSanPham;
use App\Models\NhanHang;
use App\Models\SanPham;
use App\Models\SanPhamThongSo;
use App\Models\The;
use App\Models\TheSanPham;
use App\Models\ThongSoKyThuat;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Components\DanhMucChaCon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use function PHPUnit\Framework\isEmpty;
use DB;


class SanPhamController extends Controller
{
    use ImageTrait;
    private $danhmucsanpham;
    private $nhanhang;
    private $anhsanpham;
    private $the;
    private $thesanpham;
    private $sanpham;
    private $thongsokythuat;
    private $sanphamthongso;
    public function __construct(DanhMucSanPham $danhmucsanpham, NhanHang $nhanhang,SanPham $sanpham, AnhSanPham $anhsanpham,
                                The $the,TheSanPham $thesanpham,ThongSoKyThuat $thongsokythuat, SanPhamThongSo $sanphamthongso){
        $this->danhmucsanpham = $danhmucsanpham;
        $this->nhanhang = $nhanhang;
        $this->sanpham = $sanpham;
        $this->anhsanpham=$anhsanpham;
        $this->the=$the;
        $this->thesanpham=$thesanpham;
        $this->thongsokythuat=$thongsokythuat;
        $this->sanphamthongso = $sanphamthongso;
    }
    public function trangChu(){
        $SanPham= $this->sanpham->latest()->paginate(5);
        return view('admin.sanpham.trangChu',compact('SanPham'));
    }

    public function them(){
        $DanhMucChaCon = new DanhMucChaCon($this->danhmucsanpham->all());
        $htmlOption = $DanhMucChaCon->DanhMucSanPhamChaCon($danhMucCha='');
        $NhanHang = new DanhMucChaCon($this->nhanhang->all());
        $htmlOptionNhanHang = $NhanHang->NhanHangChaCon($danhMucCha='');
        return view('admin.sanpham.them',compact('htmlOption','htmlOptionNhanHang'));
    }
    public  function themSanPham(SanPhamRequest $request){
        try {
            DB::beginTransaction();

            $dataSanPham=[
                'TenSanPham' => $request->TenSanPham,
                'GiaGoc' => $request->GiaGoc,
                'GiamGia' =>$request->GiamGia,
                'GiaBan' => $request->GiaBan,
                'MoTaSanPham' => $request->MoTaSanPham,
                'MataiKhoan' => auth()->id(),
                'MaDanhMuc' => $request->MaDanhMuc,
                'MaNhanHang' => $request->MaNhanHang

            ];
            $dataUpLoad = $this->traitUpLoadImg($request,'AnhSanPham','sanpham');
            if(!empty($dataUpLoad)){
                $dataSanPham['AnhSanPham'] = $dataUpLoad['file_path'];
                $dataSanPham['TenAnh'] = $dataUpLoad['file_name'];
            }
            $sanpham = $this->sanpham->create($dataSanPham);


            //them hình ảnh vào bảng anh_sanpham
            if($request->hasFile('AnhChiTiet')){
                foreach ($request->AnhChiTiet as $item){
                    $dataAnhSanPhan = $this->traitUpLoadmultipleImg($item,'sanpham');
                    $sanpham->anh()->create([
                        'AnhChiTiet'=>$dataAnhSanPhan['file_path'],
                        'TenAnh'=>$dataAnhSanPhan['file_name']
                    ]);
                }
            }

            //them tags vào bảng thẻ
            if(!empty($request->TenThe)){
                foreach ($request->TenThe as $item){

                    $the = $this->the->firstOrCreate([
                        'TenThe'=>$item

                    ]);
                    $mathe[]=$the->MaThe;
                }
                $sanpham->the()->attach($mathe);
            }
            if (!empty($request->TenThongSo)&&!empty($request->GiaTri)) {
                $thongSoData = [];
                    // Lặp qua các thông số và giá trị
                    foreach ($request->TenThongSo as $index => $tenThongSo) {
                        $maThongSo = null;

                        // Kiểm tra nếu thông số đã tồn tại, nếu chưa thì tạo mới
                        $thongsokythuat = $this->thongsokythuat->firstOrCreate(['TenThongSo' => $tenThongSo]);
                        $maThongSo = $thongsokythuat->MaThongSo;
                        // Lưu thông tin vào mảng
                        $thongSoData[$maThongSo] = [
                            'GiaTri' => $request->GiaTri[$index]
                        ];
                }
                // Gắn kết thông số với sản phẩm
                $sanpham->sanphamthongso()->attach($thongSoData);
            }

            //thêm thông số mới thêm vào bảng thông số kỹ thuật
//            if(!empty($request->TenThongSo)){
//                foreach ($request->TenThongSo as $item){
//                    $thongsokythuat = $this->thongsokythuat->firstOrCreate([
//                        'TenThongSo'=>$item
//                    ]);
//                    $mathongso[] = $thongsokythuat->MaThongSo;
//                }
//                $sanpham->sanphamthongso()->attach($mathongso);
//            }
            //them thong so ky thuat vào bảng sản phẩm thông số
            DB::commit();

            return redirect()->route('san-pham.trangChu');

        }catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());

        }
    }

    public function sua($masanpham){
        $sanpham =$this->sanpham->find($masanpham);
        $DanhMucChaCon = new DanhMucChaCon($this->danhmucsanpham->all());
        $htmlOption = $DanhMucChaCon->DanhMucSanPhamChaCon($sanpham->MaDanhMuc);
        $danhmucsanpham =$this->danhmucsanpham->with('danhmucthongso')->find($sanpham->MaDanhMuc);


        $NhanHang = new DanhMucChaCon($this->nhanhang->all());
        $htmlOptionNhanHang = $NhanHang->NhanHangChaCon($sanpham->MaNhanHang);
        return view('admin.sanpham.sua',compact('htmlOption','htmlOptionNhanHang','sanpham','danhmucsanpham'));
    }
    public function capNhap(Request $request, $masanpham){
        try {
            DB::beginTransaction();
            $dataSanPham=[
                'TenSanPham' => $request->TenSanPham,
                'GiaGoc' => $request->GiaGoc,
                'GiamGia' =>$request->GiamGia,
                'GiaBan' => $request->GiaBan,
                'MoTaSanPham' => $request->MoTaSanPham,
                'MataiKhoan' => auth()->id(),
                'MaDanhMuc' => $request->MaDanhMuc,
                'MaNhanHang' => $request->MaNhanHang

            ];
            $dataUpLoad = $this->traitUpLoadImg($request,'AnhSanPham','sanpham');
            if(!empty($dataUpLoad)){
                $dataSanPham['AnhSanPham'] = $dataUpLoad['file_path'];
                $dataSanPham['TenAnh'] = $dataUpLoad['file_name'];
            }
            $this->sanpham->find($masanpham)->update($dataSanPham);
            $sanpham = $this->sanpham->find($masanpham);


            //them hình ảnh vào bảng anh_sanpham
            if($request->hasFile('AnhChiTiet')){
                $this->anhsanpham->where('MaSanPham',$masanpham)->delete;
                foreach ($request->AnhChiTiet as $item){
                    $dataAnhSanPhan = $this->traitUpLoadmultipleImg($item,'sanpham');
                    $sanpham->anh()->create([
                        'AnhChiTiet'=>$dataAnhSanPhan['file_path'],
                        'TenAnh'=>$dataAnhSanPhan['file_name']
                    ]);
                }
            }

            //them tags vào bảng thẻ
            if(!empty($request->TenThe)){
                foreach ($request->TenThe as $item){

                    $the = $this->the->firstOrCreate([
                        'TenThe'=>$item
                    ]);
                    $mathe[]=$the->MaThe;
//                TheSanPham::create([
//                    'MaSanPham'=>$sanpham->MaSanPham,
//                    'MaThe'=>$the->MaThe
//                ]);
                }
                $sanpham->the()->sync($mathe);
            }
            //sửa thông số và thông số sản phẩm
            if (!empty($request->TenThongSo)&&!empty($request->GiaTri)) {
                $thongSoData = [];
                // Lặp qua các thông số và giá trị
                foreach ($request->TenThongSo as $index => $tenThongSo) {
                    $maThongSo = null;

                    // Kiểm tra nếu thông số đã tồn tại, nếu chưa thì tạo mới
                    $thongsokythuat = $this->thongsokythuat->firstOrCreate(['TenThongSo' => $tenThongSo]);
                    $maThongSo = $thongsokythuat->MaThongSo;
                    // Lưu thông tin vào mảng
                    $thongSoData[$maThongSo] = [
                        'GiaTri' => $request->GiaTri[$index]
                    ];
                }
                // Gắn kết thông số với sản phẩm
                $sanpham->sanphamthongso()->sync($thongSoData);
            }
            DB::commit();

            return redirect()->route('san-pham.trangChu');

        }catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }
    }

    public function xoa($masanpham){
        try {
            $this->sanpham->find($masanpham)->delete();
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
        $danhSachSPDaXoa = $this->sanpham->onlyTrashed()->get();
        return view('admin.sanpham.danhSachDaXoa',compact('danhSachSPDaXoa'));
    }

    public function khoiPhuc($masanpham){
        $sanpham = $this->sanpham::withTrashed()->find($masanpham);
        if ($sanpham) {
            $sanpham->restore();
            return redirect()->route('san-pham.danh-sach-da-xoa');
        }

    }
    public function xoaVinhVien($masanpham){
        try {
            $sanpham = $this->sanpham::withTrashed()->find($masanpham);
            if ($sanpham) {
                $sanpham->forceDelete();
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
    public function getDanhMucSanPham($MaDanhMuc) {
        $danhMucSanPham = $this->danhmucsanpham->find($MaDanhMuc);
        $danhmucthongso= $danhMucSanPham->danhmucthongso;
        if ($danhmucthongso) {
            return response()->json($danhmucthongso);
        } else {
            return response()->json(['error' => 'Không tìm thấy danh mục'], 404);
        }
    }

    public function search(Request $request){
        $output .='';
        $sanpham =$this->sanpham->where('TenSanPham', 'Like', '%'.$request->search.'%')->orwhere('GiaBan',
            'Like', '%'.$request->search.'%')->get();
        foreach ($sanpham as $sp){
            $output .=
                '<tr> <td>'.$sanpham->TenSanPham.'</td></tr>';
        }
        return response($output);
    }
    public function getsanphamthongso(){
        $DanhMucChaCon = new DanhMucChaCon($this->danhmucsanpham->all());
        $danhmucsanpham = $DanhMucChaCon->DanhMucSanPhamChaCon($danhMucCha='');
        return view('admin.sanpham.getsanphamthongso',compact('danhmucsanpham'));
    }
    public function postsanphamthongso(Request $request){
        if (!empty($request->TenThongSo)&&!empty($request->GiaTri)) {
            $thongSoData = [];
            // Lặp qua các thông số và giá trị
            foreach ($request->TenThongSo as $index => $tenThongSo) {
                $maThongSo = null;

                // Kiểm tra nếu thông số đã tồn tại, nếu chưa thì tạo mới
                $thongsokythuat = ThongSoKyThuat::firstOrCreate(['TenThongSo' => $tenThongSo]);
                $maThongSo = $thongsokythuat->MaThongSo;
                // Lưu thông tin vào mảng
                $thongSoData[$maThongSo] = [
                    'GiaTri' => $request->GiaTri[$index]
                ];

            }
            dd($thongSoData);

            // Gắn kết thông số với sản phẩm
//            $sanpham->sanphamthongso()->sync($thongSoData);
        }
    }
    public function xoasanphamthongso($masanpham, $mathongso){
        try {
            $sanPhamThongSo = $this->sanphamthongso->where('MaSanPham', $masanpham)
                ->where('MaThongSo', $mathongso)
                ->delete();
            // Xóa thông số kỹ thuật nếu tồn tại
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
    public function xoaTatCa(Request $request){
        try {
            $ids = $request->ids;
            $this->sanpham->whereIn('MaSanPham',$ids)->delete();
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
