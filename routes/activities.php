<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/activities', function () {
        return view('activities.index');
    })->name('activities');
    Route::get('/activities/create', function() {
        return view('activities.create');
    })->name('activities.create');
});
