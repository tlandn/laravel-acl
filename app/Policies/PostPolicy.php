<?php

namespace App\Policies;

use App\Post;
use App\User;

class PostPolicy
{

    public function update1(User $user, Post $post)
    {
        dd('AAAAAA');
        return $user->id == $post->user_id;
    }
}
