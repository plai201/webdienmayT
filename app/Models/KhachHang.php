<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table='khach_hang';
    protected $primaryKey='MaKhachHang';
    protected $guarded=[];
}
