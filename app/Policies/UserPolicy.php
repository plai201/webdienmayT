<?php

namespace App\Policies;

use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user ): bool
    {
        return $user->checkPermissionAcces('Tài khoản_Xem danh sách');

    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionAcces('Sản phẩm_Thêm');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->checkPermissionAcces('Sản phẩm_Sửa');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->checkPermissionAcces('Sản phẩm_Xoá');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return $user->checkPermissionAcces('Sản phẩm_Khôi phục');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {

    }
}
