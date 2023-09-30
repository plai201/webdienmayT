<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class SanPhamThongSo extends Model
{
    use HasFactory;
    protected $table ='san_pham_thong_so';
    protected $guarded=[];
}
