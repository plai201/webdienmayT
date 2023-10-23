<?php

namespace App\Policies;

use App\Models\DonHang;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DonHangPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user ): bool
    {
        return $user->checkPermissionAcces('Đơn hàng_Xem danh sách');
    }
     public function viewDetail(User $user ): bool
    {
        return $user->checkPermissionAcces('Đơn hàng chi tiết_Xem danh sách');
    }




    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->checkPermissionAcces('Đơn hàng_Sửa');

    }
//
//    /**
//     * Determine whether the user can delete the model.
//     */
//    public function delete(User $user, DonHang $donHang): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can restore the model.
//     */
//    public function restore(User $user, DonHang $donHang): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     */
//    public function forceDelete(User $user, DonHang $donHang): bool
//    {
//        //
//    }
}
