<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanhSo extends Model
{
    use HasFactory;
    protected $table='doanh_so';
    protected $primaryKey='MaDoanhSo';
    protected $guarded=[];
    public $timestamps =false;
}
