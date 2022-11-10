<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/paths', function() {
        return view('paths.index');
    })->name('paths');
    Route::get('/paths/create', function() {
        return view('paths.create');
    })->name('paths.create');
});
