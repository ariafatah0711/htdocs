<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JenisTraining;
use App\Models\User;

class JenisTrainingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any JenisTraining');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisTraining $jenistraining): bool
    {
        return $user->checkPermissionTo('view JenisTraining');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create JenisTraining');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisTraining $jenistraining): bool
    {
        return $user->checkPermissionTo('update JenisTraining');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisTraining $jenistraining): bool
    {
        return $user->checkPermissionTo('delete JenisTraining');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any JenisTraining');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JenisTraining $jenistraining): bool
    {
        return $user->checkPermissionTo('restore JenisTraining');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any JenisTraining');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, JenisTraining $jenistraining): bool
    {
        return $user->checkPermissionTo('replicate JenisTraining');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder JenisTraining');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisTraining $jenistraining): bool
    {
        return $user->checkPermissionTo('force-delete JenisTraining');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any JenisTraining');
    }
}
