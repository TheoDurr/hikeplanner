<?php

namespace App\Policies;

use App\Models\Difficulty;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DifficultyPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->isAdmin();
    }
    
    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Difficulty $difficulty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Difficulty $difficulty)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Difficulty $difficulty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Difficulty $difficulty)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Difficulty $difficulty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Difficulty $difficulty)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Difficulty $difficulty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Difficulty $difficulty)
    {
        return false;
    }
}
