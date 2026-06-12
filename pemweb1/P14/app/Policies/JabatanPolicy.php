<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Jabatan;
use App\Models\User;

class JabatanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Jabatan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Jabatan $jabatan): bool
    {
        return $user->checkPermissionTo('view Jabatan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Jabatan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Jabatan $jabatan): bool
    {
        return $user->checkPermissionTo('update Jabatan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Jabatan $jabatan): bool
    {
        return $user->checkPermissionTo('delete Jabatan');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Jabatan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Jabatan $jabatan): bool
    {
        return $user->checkPermissionTo('restore Jabatan');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Jabatan');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Jabatan $jabatan): bool
    {
        return $user->checkPermissionTo('replicate Jabatan');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Jabatan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Jabatan $jabatan): bool
    {
        return $user->checkPermissionTo('force-delete Jabatan');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Jabatan');
    }
}
