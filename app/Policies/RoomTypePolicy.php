<?php

namespace App\Policies;

use App\User;
use App\RoomType;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the room type.
     *
     * @param  \App\User  $user
     * @param  \App\RoomType  $roomType
     * @return mixed
     */
    public function view(User $user, RoomType $roomType)
    {
        return $user->hasAccess(['view_roomtypes']);
    }

    /**
     * Determine whether the user can create room types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess(['manage_roomtypes']);
    }

    /**
     * Determine whether the user can update the room type.
     *
     * @param  \App\User  $user
     * @param  \App\RoomType  $roomType
     * @return mixed
     */
    public function update(User $user, RoomType $roomType)
    {
        return $user->hasAccess(['manage_roomtypes']);
    }

    /**
     * Determine whether the user can delete the room type.
     *
     * @param  \App\User  $user
     * @param  \App\RoomType  $roomType
     * @return mixed
     */
    public function delete(User $user, RoomType $roomType)
    {
        return $user->hasAccess(['manage_roomtypes']);
    }
}
