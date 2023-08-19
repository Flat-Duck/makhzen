<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Issue;
use Illuminate\Auth\Access\HandlesAuthorization;

class IssuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the issue can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list issues');
    }

    /**
     * Determine whether the issue can view the model.
     */
    public function view(User $user, Issue $model): bool
    {
        return $user->hasPermissionTo('view issues');
    }

    /**
     * Determine whether the issue can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create issues');
    }

    /**
     * Determine whether the issue can update the model.
     */
    public function update(User $user, Issue $model): bool
    {
        return $user->hasPermissionTo('update issues');
    }

    /**
     * Determine whether the issue can delete the model.
     */
    public function delete(User $user, Issue $model): bool
    {
        return $user->hasPermissionTo('delete issues');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete issues');
    }

    /**
     * Determine whether the issue can restore the model.
     */
    public function restore(User $user, Issue $model): bool
    {
        return false;
    }

    /**
     * Determine whether the issue can permanently delete the model.
     */
    public function forceDelete(User $user, Issue $model): bool
    {
        return false;
    }
}
