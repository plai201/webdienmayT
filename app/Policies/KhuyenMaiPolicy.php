<?php

namespace App\Policies;

use App\Models\KhuyenMai;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KhuyenMaiPolicy
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
    public function view(User $user): bool
    {
        return $user->checkPermissionAcces('Đơn hàng khuyến mãi_Xem danh sách');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionAcces('Đơn hàng khuyến mãi_Thêm');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user ): bool
    {
        return $user->checkPermissionAcces('Đơn hàng khuyến mãi_Sửa');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user ): bool
    {
        return $user->checkPermissionAcces('Đơn hàng khuyến mãi_Xoá');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KhuyenMai $khuyenMai): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KhuyenMai $khuyenMai): bool
    {
        //
    }
}
