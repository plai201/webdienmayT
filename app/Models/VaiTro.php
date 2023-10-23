<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;
    protected $table='vai_tro';
    protected $primaryKey='MaVaiTro';
    protected $guarded=[];
    public function permission()
    {
        return $this->belongsToMany(Quyen::class,'quyen_vai_tro','MaVaiTro','MaQuyen');
    }

}
