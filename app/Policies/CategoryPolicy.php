<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\Club;
use App\Models\Comment;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }


    public function view(User $user, Comment $comment)
    {
        //
    }

    public function create(User $user)
    {
        return $user->role->name =='moderator';
    }


    public function delete(User $user, Category $category)
    {
        return ($user->id ==$category->user_id) || ($user->role->name!='user');
    }



}
