<?php

namespace App\Policies;

use App\User;
use App\Occupant;
use Illuminate\Auth\Access\HandlesAuthorization;

class OccupantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the occupant.
     *
     * @param  \App\User  $user
     * @param  \App\Occupant  $occupant
     * @return mixed
     */
    public function view(User $user, Occupant $occupant)
    {
        //
        return $user->hasAccess(['view_occupants']);
    }

    /**
     * Determine whether the user can create occupants.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->hasAccess(['manage_occupants']);
    }

    /**
     * Determine whether the user can update the occupant.
     *
     * @param  \App\User  $user
     * @param  \App\Occupant  $occupant
     * @return mixed
     */
    public function update(User $user, Occupant $occupant)
    {
        //
        return $user->hasAccess(['manage_occupants']);
    }

    /**
     * Determine whether the user can delete the occupant.
     *
     * @param  \App\User  $user
     * @param  \App\Occupant  $occupant
     * @return mixed
     */
    public function delete(User $user, Occupant $occupant)
    {
        //
        return $user->hasAccess(['manage_occupants']);
    }

    public function checkout(User $user, Occupant $occupant)
    {
        return $user->hasAccess(['manage_occupants']);
    }
}
