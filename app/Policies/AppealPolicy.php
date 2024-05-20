<?php

namespace App\Policies;

use App\Models\Appeal;
use App\Models\User;

class AppealPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin') || $user->account_type == 'Chairperson';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Appeal $appeal): bool
    {
        return $user->hasRole('admin') || $user->account_type == 'Chairperson';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Appeal $appeal): bool
    {
        return $user->hasRole('admin') || $user->account_type == 'Chairperson';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Appeal $appeal): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Appeal $appeal): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Appeal $appeal): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can export models.
     */
    public function export(User $user): bool
    {
        return $user->hasRole('admin') || $user->account_type == 'Chairperson';
    }
}
