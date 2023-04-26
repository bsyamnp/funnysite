<?php

namespace App\Policies;

use App\Models\Club;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClubPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->role->name =='admin';
    }


    public function view(User $user, Club $club)
    {
        //
    }

    public function create(User $user)
    {
        return $user->role->name =='moderator';
    }

    public function update(User $user, Club $club)
    {
        //
    }

    public function edit(User $user, Club $club)
    {
        return ($user->id ==$club->user_id) || ($user->role->name!='user');
    }

    public function delete(User $user, Club $club)
    {
        return ($user->id ==$club->user_id) || ($user->role->name!='user');
    }


    public function restore(User $user, Club $club)
    {
        //
    }


    public function forceDelete(User $user, Club $club)
    {
        //
    }
}
