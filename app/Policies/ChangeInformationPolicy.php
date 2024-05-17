<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Employee;
use App\Models\Changeinformation;
use Illuminate\Auth\Access\Response;

class ChangeInformationPolicy
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
    public function view(User $user, Changeinformation $changeinformation): bool
    {
        return $user->employee_id == $changeinformation->employee_id || $user->is_admin == True;
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
    public function update(User $user, Changeinformation $changeinformation, $type = Null): bool
    {
        if($type == "Approve"){
            $loggedInUser = Employee::select('department_id', 'dean_id', 'is_department_head_or_dean')
                ->where('employee_id', $user->employee_id)
                ->first();
            $head = explode(',', $loggedInUser->is_department_head_or_dean[0] ?? ' ');
         
            if($head[0] == 1 || $head[1] == 1){      
                $ownerData = Employee::select('department_id', 'dean_id' )
                    ->where('employee_id', $changeinformation->employee_id)
                    ->first();
                if($ownerData->department_id == $loggedInUser->department_id ||  $ownerData->dean_id == $loggedInUser->dean_id){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
           
        } else {
            return $user->employee_id == $changeinformation->employee_id || $user->is_admin == True;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Changeinformation $changeinformation): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Changeinformation $changeinformation): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Changeinformation $changeinformation): bool
    {
        //
    }
}
