<?php

namespace App\Policies;

use App\Models\GradStudent;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GradStudentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('dean_gsp')|| $user->hasRole('dean_dual')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GradStudent $gradStudent): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('dean_gsp')|| $user->hasRole('dean_dual')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('dean_gsp')|| $user->hasRole('dean_dual')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GradStudent $gradStudent): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('dean_gsp')|| $user->hasRole('dean_dual')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GradStudent $gradStudent): bool
    {
        if ($user->hasRole('admin') ) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GradStudent $gradStudent): bool
    {
        if ($user->hasRole('admin') ) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GradStudent $gradStudent): bool
    {
        if ($user->hasRole('admin') ) 
        {
            return true;
        }
        return false;
    }
}
