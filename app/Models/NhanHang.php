<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NhanHang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='nhan_hang';
    protected $primaryKey='MaNhanHang';


    protected $fillable = [
        'TenNhanHang',
        'Anh',
    ];
}
