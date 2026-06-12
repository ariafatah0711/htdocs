<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PegawaiTraining;
use App\Models\User;

class PegawaiTrainingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PegawaiTraining');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PegawaiTraining $pegawaitraining): bool
    {
        return $user->checkPermissionTo('view PegawaiTraining');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PegawaiTraining');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PegawaiTraining $pegawaitraining): bool
    {
        return $user->checkPermissionTo('update PegawaiTraining');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PegawaiTraining $pegawaitraining): bool
    {
        return $user->checkPermissionTo('delete PegawaiTraining');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any PegawaiTraining');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PegawaiTraining $pegawaitraining): bool
    {
        return $user->checkPermissionTo('restore PegawaiTraining');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any PegawaiTraining');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, PegawaiTraining $pegawaitraining): bool
    {
        return $user->checkPermissionTo('replicate PegawaiTraining');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder PegawaiTraining');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PegawaiTraining $pegawaitraining): bool
    {
        return $user->checkPermissionTo('force-delete PegawaiTraining');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PegawaiTraining');
    }
}
