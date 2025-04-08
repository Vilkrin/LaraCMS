<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function view(?User $user, Post $post): bool
    {
        if ($post->published) {
            return true;
        }

        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }

        // admin overrides published status
        if ($user->can('view unpublished posts')) {
            return true;
        }

        // authors can view their own unpublished posts
        return $user->id == $post->user_id;
    }

    public function create(User $user): bool
    {
        return $user->can('create posts');
    }

    public function update(User $user, Post $post): bool
    {
        if ($user->can('edit all posts')) {
            return true;
        }

        if ($user->can('edit own posts')) {
            return $user->id == $post->user_id;
        }
    }

    public function delete(User $user, Post $post): bool
    {
        if ($user->can('delete any post')) {
            return true;
        }

        if ($user->can('delete own posts')) {
            return $user->id == $post->user_id;
        }
    }

    public function __construct()
    {
        //
    }
}
