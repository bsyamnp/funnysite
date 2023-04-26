<?php

namespace App\Policies;

use App\Models\Club;
use App\Models\Comment;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }


    public function view(User $user, Comment $comment)
    {
        //
    }




    public function delete(User $user, Comment $comment)
    {
        return ($user->id ==$comment->user_id) || ($user->role->name!='user');
    }



}
