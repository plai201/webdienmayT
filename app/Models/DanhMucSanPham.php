<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanhMucSanPham extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'danh_muc_san_pham'; // Đổi tên bảng mới tại đây

    protected $primaryKey = 'MaDanhMuc'; // Khóa chính của bảng
    public function danhmucthongso(){
        return $this->belongsToMany(ThongSoKyThuat::class, 'danh_muc_thong_so','MaDanhMuc','MaThongSo')->withTimestamps();
    }

    public $timestamps = true; // Sử dụng cột thời gian tạo và cập nhật

    // Các cột khác trong bảng
    protected $fillable = [
        'TenDanhMuc',
        'DanhMucCha',
        'Anh'
    ];

}
