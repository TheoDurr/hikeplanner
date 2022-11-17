<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here are defined user routes, related to the UserController class.
|
*/

Route::middleware('auth')->group(function () {
    Route::prefix('/users')->group(function () {
        Route::get('/', function () {
            return view('users.list', ['users' => User::all()]);
        })->name('users');

        Route::get('/me', function () {
            return redirect()->route('userProfile', ['user' => Auth::user()->uuid]);
        })->name('myProfile');

        Route::get('{user:uuid}', function (User $user) {
            return view('user.profile', ['user' => $user]);
        })->name('userProfile');

        Route::get('{user:uuid}/edit', function (User $user) {
            return view('user.edit', ['user' => $user]);
        })->name('editProfile');
    });
});
