<?php

use App\Http\Controllers\EntryTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('cash-flow')->group(function () {
        Route::view('entries', 'entries')->name('entries');
    });

    Route::prefix('settings')->group(function () {
        Route::get('entry-types', [EntryTypeController::class, 'index'])->name('entry-types');
        Route::post('entry-types', [EntryTypeController::class, 'store'])->name('entry-types.store');
        Route::delete('entry-types/{id}', [EntryTypeController::class, 'destroy'])->name('entry-types.destroy');
    });

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
