<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
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
}
