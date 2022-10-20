<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Test extends Component
{
    public $count = 1;

    public function add() {
        $this->count++;
    }

    public function less() {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
