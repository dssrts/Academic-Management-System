<?php

namespace App\Policies;

use App\Models\UndergradStudent;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UndergradStudentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('dean_crs')|| $user->hasRole('dean_dual')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UndergradStudent $undergradStudent): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('dean_crs')|| $user->hasRole('dean_dual')) 
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
        if ($user->hasRole('admin') || $user->hasRole('dean_crs')|| $user->hasRole('dean_dual')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UndergradStudent $undergradStudent): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('dean_crs')|| $user->hasRole('dean_dual')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UndergradStudent $undergradStudent): bool
    {
        if ($user->hasRole('admin')) 
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UndergradStudent $undergradStudent): bool
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
    public function forceDelete(User $user, UndergradStudent $undergradStudent): bool
    {
        if ($user->hasRole('admin') ) 
        {
            return true;
        }
        return false;
    }
}
