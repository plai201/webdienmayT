<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class The extends Model
{
    use HasFactory;
    protected $table = 'the';
    protected $primaryKey = 'MaThe';
    protected $guarded=[];
}
