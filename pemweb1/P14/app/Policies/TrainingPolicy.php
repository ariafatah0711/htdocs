<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Training;
use App\Models\User;

class TrainingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Training');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Training $training): bool
    {
        return $user->checkPermissionTo('view Training');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Training');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Training $training): bool
    {
        return $user->checkPermissionTo('update Training');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Training $training): bool
    {
        return $user->checkPermissionTo('delete Training');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Training');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Training $training): bool
    {
        return $user->checkPermissionTo('restore Training');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Training');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Training $training): bool
    {
        return $user->checkPermissionTo('replicate Training');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Training');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Training $training): bool
    {
        return $user->checkPermissionTo('force-delete Training');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Training');
    }
}
