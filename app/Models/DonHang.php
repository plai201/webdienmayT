<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table='don_hang';
    protected $primaryKey='MaDonHang';
    protected $guarded=[];
}
