<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
     protected $table = 'danh_gia'; // Đổi tên bảng mới tại đây

    protected $primaryKey = 'MaDanhGia'; // Khóa chính của bảng


    public $timestamps = false; // Sử dụng cột thời gian tạo và cập nhật

     protected $guarded=[];
}
