<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowUser extends Component
{
    public User $user;

    public function follow(User $follower, User $following)
    {
        $follower->follow($following);
    }

    public function unfollow(User $follower, User $following)
    {
        $follower->unfollow($following);
    }

    public function render()
    {
        $this->emit('followStatsUpdated');
        return view('livewire.follow-user');
    }
}
