<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('cash-flow')->group(function () {
        Route::view('entries', 'entries')->name('entries');
    });

    Route::prefix('settings')->group(function () {
        Route::view('entry-types', 'entry-types')->name('entry-types');
    });

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
