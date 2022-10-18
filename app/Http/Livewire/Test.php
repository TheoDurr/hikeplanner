<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Test extends Component
{

    public function addUser() {
        // Generate a UUID
        do {
            $uuid = Str::uuid();
        } while (User::find($uuid));

        $user = new User();
        $user->uuid = $uuid;
        $user->username = 'simon';
        $user->password = str_repeat('0', 255);
        $user->email = 'simon@test.test';

        $user->save();
    }

    public function deleteUser() {
        $user = User::all()->first();
        $user->delete();
    }

    public function render()
    {
        return view('livewire.test', [
            'users' => User::all(),
        ]);
    }
}
