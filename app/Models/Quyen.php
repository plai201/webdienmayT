<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Quyen extends Model
{
    use HasFactory;
    protected $table='quyen';
    protected $primaryKey='MaQuyen';
    protected $guarded=[];
    public $timestamps = false;
    public function quyenChild(){
        return $this->hasMany(Quyen::class, 'MaQuyenCha');
    }
}
