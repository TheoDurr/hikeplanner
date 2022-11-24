<?php

namespace App\Http\Livewire\Follow;

use Livewire\Component;

class UserProfileStats extends Component
{
    public $user;

    protected $listeners = ['followStatsUpdated' => 'render'];

    public function render()
    {
        return <<<'blade'
            <span class="text-xs">{{ __("Followers") . " : " . $user->getFollowerCount() }}</span>
            <span class="text-xs">{{ __("Following") . " : " . $user->getFollowingCount() }}</span>
        blade;
    }
}
