<?php

namespace App\Http\Controllers;

use App\Models\Quyen;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(VaiTro $role, Quyen $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function trangChu(){
        $roles = $this->role->paginate(10);
        return view('admin.vaitro.trangchu',compact('roles'));
    }
    public function them(){
        $permissionParents = $this->permission->where('MaQuyenCha',0)->get();
        $permissionChilds = $this->permission->quyenChild;
        return view('admin.vaitro.them',compact('permissionParents','permissionChilds'));
    }
    public function themVaiTro(Request $request){
      $role = $this->role->create([
          'TenVaiTro'=>$request->TenVaiTro,
          'TenHienThi'=>$request->TenHienThi
      ]);
      $role->permission()->attach($request->MaQuyen);
      return redirect()->route('roles.trangChu');

    }
    public function suaVaiTro($mavaitro){
        $permissionParents = $this->permission->where('MaQuyenCha',0)->get();

        $role = $this->role->find($mavaitro);
        $permissionChecked = $role->permission;
        return view('admin.vaitro.sua',compact('role','permissionChecked','permissionParents'));
    }

    public function capNhapVaiTro(Request $request,$mavaitro){
        $this->role->find($mavaitro)->update([
            'TenVaiTro'=>$request->TenVaiTro,
            'TenHienThi'=>$request->TenHienThi
        ]);
        $role = $this->role->find($mavaitro);
        $role->permission()->sync($request->MaQuyen);
        return redirect()->route('roles.trangChu');
    }
    public function xoa($mavaitro){
        try {
            $this->role->find($mavaitro)->delete();
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
    public function themQuyen(){
        return view('admin.quyen.them');
    }
    public function themQuyenModule(Request $request){
      $quyen = Quyen::create([
         'TenQuyen' =>$request->module_cha,
         'TenHienThi' =>$request->module_cha,
         'MaQuyenCha' =>0
      ]);
      foreach ($request->module_con as $item){
          Quyen::create([
              'TenQuyen' =>$item,
              'TenHienThi' =>$item,
              'MaQuyenCha' => $quyen->MaQuyen,
              'MaPhanQuyen' =>$request->module_cha . '_' .$item
          ]);
      }
    }
}
