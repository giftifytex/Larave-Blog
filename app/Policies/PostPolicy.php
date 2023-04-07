<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
        
    }

    public function view(User $user, Post $post){
            return true;
    }

   /* public function update(User $user, Post $post){
        return $user->id === $post->user_id;
    } */

      public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
