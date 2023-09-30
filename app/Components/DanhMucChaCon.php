<?php

namespace App\Components;

class DanhMucChaCon
{
    private $data;
    private $htmlSlect='';
    public function __construct($data){
        $this->data = $data;
    }
    function DanhMucSanPhamChaCon($danhMucCha,$ma = 0,$text =''){
        foreach ($this->data as $value) {
            if ($value->DanhMucCha == $ma) {
                if(!empty($danhMucCha) && $danhMucCha == $value->MaDanhMuc){
                    $this->htmlSlect .="<option selected value='".$value->MaDanhMuc."'>" .$text. $value->TenDanhMuc . "</option>";
                } else{
                    $this->htmlSlect .="<option value='".$value->MaDanhMuc."'>" .$text. $value->TenDanhMuc . "</option>";
                }
                $this->DanhMucSanPhamChaCon($danhMucCha,$value->MaDanhMuc, $text . '-');
            }
        }
        return $this->htmlSlect;
    }
    function DanhMucSanPhamChaCon2($danhMucCha,$ma = 0,$text =''){
        foreach ($this->data as $value) {
            if ($value->DanhMucCha == $ma) {
                if(!empty($danhMucCha) && $danhMucCha == $value->MaDanhMuc){
                    $this->htmlSlect .= "<option selected data-url=\"" . route('getDanhMucSanPham', ['MaDanhMuc' => $value->MaDanhMuc]) . "\" value='" . $value->MaDanhMuc . "'>" . $text . $value->TenDanhMuc . "</option>";
                } else{
                    $this->htmlSlect .= "<option data-url=\"" . route('getDanhMucSanPham', ['MaDanhMuc' => $value->MaDanhMuc]) . "\" value='" . $value->MaDanhMuc . "'>" . $text . $value->TenDanhMuc . "</option>";
                }
                $this->DanhMucSanPhamChaCon($danhMucCha,$value->MaDanhMuc, $text . '-');
            }
        }
        return $this->htmlSlect;
    }
    function NhanHangChaCon($danhMucCha,$text =''){
        foreach ($this->data as $value){
            if(!empty($danhMucCha && $danhMucCha == $value->MaNhanHang)){
                $this->htmlSlect .="<option selected value='".$value->MaNhanHang."'>" .$text. $value->TenNhanHang . "</option>";
            }
            else{
                $this->htmlSlect .="<option value='".$value->MaNhanHang."'>" .$text. $value->TenNhanHang . "</option>";
            }
        }
        return $this->htmlSlect;
    }

}
