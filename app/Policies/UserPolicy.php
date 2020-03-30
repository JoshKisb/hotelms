<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    
    public function view(User $curr_user, User $user)
    {
        return ($curr_user->id == $user->id) || $curr_user->hasAccess(['view_users']);
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess(['manage_users']);
    }

    
    public function update(User $curr_user, User $user)
    {
        return ($curr_user->id == $user->id) || $curr_user->hasAccess(['manage_users']);
    }

    
    public function delete(User $curr_user, User $user)
    {
        return $curr_user->hasAccess(['manage_users']);
    }
}
