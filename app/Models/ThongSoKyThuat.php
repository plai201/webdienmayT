<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class ThongSoKyThuat extends Model
{
    use HasFactory;
    protected $table = 'thong_so_ky_thuat';
    protected $primaryKey = 'MaThongSo';
    public $incrementing = true;
    protected $guarded=[];
    public function danhmucsanphams()
    {
        return $this->belongsToMany(DanhMucSanPham::class, 'danh_muc_thong_so', 'MaThongSo', 'MaDanhMuc');
    }
}
