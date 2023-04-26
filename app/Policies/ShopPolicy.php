<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Shop $shop)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role->name =='moderator';
    }


    public function update(User $user, Shop $shop)
    {
        //
    }

    public function edit(User $user, Shop $shop)
    {
        return ($user->id ==$shop->user_id) || ($user->role->name!='user');
    }

    public function delete(User $user, Shop $shop)
    {
        return ($user->id ==$shop->user_id) || ($user->role->name!='user');
    }


    public function restore(User $user, Shop $shop)
    {
        //
    }



    public function forceDelete(User $user, Shop $shop)
    {
        //
    }
}
