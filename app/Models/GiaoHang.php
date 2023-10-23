<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoHang extends Model
{
    use HasFactory;
    protected $table='giao_hang';
    protected $primaryKey='MaGiaoHang';
    protected $guarded=[];
}
