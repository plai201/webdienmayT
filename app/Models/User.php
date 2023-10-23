<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
    protected $table='users';
    protected $primaryKey = 'MaTaiKhoan'; // Khóa chính của bảng

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function vaitro(){
        return $this->belongsToMany(VaiTro::class, 'vai_tro_tai_khoan','MaTaiKhoan','MaVaiTro');
    }
    public function checkPermissionAcces($permissionCheck){
        $roles = auth()->user()->vaitro;
        foreach ($roles as $role){
           $quyen = $role->permission;
           if($quyen->contains('MaPhanQuyen',$permissionCheck)){
               return true;
           }
        }
        return false;
    }
}
