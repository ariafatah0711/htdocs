<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Divisi;
use App\Models\User;

class DivisiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Divisi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Divisi $divisi): bool
    {
        return $user->checkPermissionTo('view Divisi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Divisi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Divisi $divisi): bool
    {
        return $user->checkPermissionTo('update Divisi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Divisi $divisi): bool
    {
        return $user->checkPermissionTo('delete Divisi');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Divisi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Divisi $divisi): bool
    {
        return $user->checkPermissionTo('restore Divisi');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Divisi');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Divisi $divisi): bool
    {
        return $user->checkPermissionTo('replicate Divisi');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Divisi');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Divisi $divisi): bool
    {
        return $user->checkPermissionTo('force-delete Divisi');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Divisi');
    }
}
