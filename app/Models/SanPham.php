<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SanPham extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'san_pham';
    protected $primaryKey = 'MaSanPham';
    protected $guarded=[];
    public function anh(){
        return $this->hasMany(AnhSanPham::class, 'MaSanPham');
    }
    public function the(){
        return $this->belongsToMany(The::class, 'the_san_pham','MaSanPham','MaThe')->withTimestamps();
    }
    public function danhmucsanpham(){
        return $this->belongsTo(DanhMucSanPham::class, 'MaDanhMuc');
    }
    public function nhanhang(){
        return $this->belongsTo(NhanHang::class, 'MaNhanHang');
    }
    public function sanphamthongso(){
        return $this->belongsToMany(ThongSoKyThuat::class, 'san_pham_thong_so','MaSanPham','MaThongSo')
            ->withPivot('GiaTri')
            ->withTimestamps();
    }
}
