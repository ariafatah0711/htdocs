<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Pegawai;
use App\Models\User;

class PegawaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Pegawai');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pegawai $pegawai): bool
    {
        return $user->checkPermissionTo('view Pegawai');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Pegawai');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pegawai $pegawai): bool
    {
        return $user->checkPermissionTo('update Pegawai');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pegawai $pegawai): bool
    {
        return $user->checkPermissionTo('delete Pegawai');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Pegawai');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pegawai $pegawai): bool
    {
        return $user->checkPermissionTo('restore Pegawai');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Pegawai');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Pegawai $pegawai): bool
    {
        return $user->checkPermissionTo('replicate Pegawai');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Pegawai');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pegawai $pegawai): bool
    {
        return $user->checkPermissionTo('force-delete Pegawai');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Pegawai');
    }
}
