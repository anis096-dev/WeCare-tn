<?php

namespace App\Policies;

use App\Models\User;
use App\Models\subTreatment;
use Illuminate\Auth\Access\Response;

class SubTreatmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('browse_subtreatments');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, subTreatment $subTreatment): bool
    {
        return $user->hasPermission('read_subtreatments');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('add_subtreatments');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, subTreatment $subTreatment): bool
    {
        return $user->hasPermission('edit_subtreatments');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, subTreatment $subTreatment): bool
    {
        return $user->hasPermission('delete_subtreatments');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, subTreatment $subTreatment): bool
    {
        return $user->hasPermission('restore_subtreatments');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, subTreatment $subTreatment): bool
    {
        return $user->hasPermission('forceDelete_subtreatments');

    }
}
