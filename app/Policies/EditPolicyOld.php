<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;


use Illuminate\Auth\Access\HandlesAuthorization;

class EditPolicy
{
    use HandlesAuthorization;


    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Todo  $todo
     * @return bool
     */
    public function edit(User $user, Todo $todo)
    {
        dd($user, $todo);
        // dd($todo->user_id, Auth::id());
        return $user->id == $todo->user_id;
    }
}
