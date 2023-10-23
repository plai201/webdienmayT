<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHangChiTiet extends Model
{
    use HasFactory;
    protected $table='don_hang_chi_tiet';
    protected $primaryKey='MaDonHangChiTiet';
    protected $guarded=[];
    public function khuyenmai(){
        return $this->belongsTo(KhuyenMai::class, 'MaKhuyenMai');
    }
}
