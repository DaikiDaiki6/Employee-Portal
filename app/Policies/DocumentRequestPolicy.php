<?php

namespace App\Policies;

use App\Models\Documentrequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DocumentRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // return 
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Documentrequest $documentrequest): bool
    {
        return $user->employee_id == $documentrequest->employee_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Documentrequest $documentrequest): bool
    {
        return $user->employee_id == $documentrequest->employee_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Documentrequest $documentrequest): bool
    {
        return $user->employee_id == $documentrequest->employee_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Documentrequest $documentrequest): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Documentrequest $documentrequest): bool
    {
        //
    }
}
