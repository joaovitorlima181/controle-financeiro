<?php

use App\Http\Controllers\EntryController;
use App\Http\Controllers\EntryTypeController;
use App\Http\Controllers\OutflowController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {

        Route::view('dashboard', 'dashboard')->name('dashboard');

        Route::prefix('cash-flow')->group(function () {
            Route::view('entries', 'entries')->name('entries');
        });

        Route::prefix('settings')->group(function () {
            Route::get('entry-types', [EntryTypeController::class, 'index'])->name('entry-types');
            Route::post('entry-types', [EntryTypeController::class, 'store'])->name('entry-types.store');
            Route::delete('entry-types/{id}', [EntryTypeController::class, 'destroy'])->name('entry-types.destroy');
        });

        Route::prefix('cash-flow')->group(function () {
            Route::get('entries', [EntryController::class, 'index'])->name('entries');
            Route::post('entries', [EntryController::class, 'store'])->name('entries.store');
            Route::post('entries/{id}', [EntryController::class, 'update'])->name('entries.update');
            Route::delete('entries/{id}', [EntryController::class, 'destroy'])->name('entries.destroy');

            Route::get('outflows', [OutflowController::class, 'index'])->name('outflows');
            Route::post('outflows', [OutflowController::class, 'store'])->name('outflows.store');
            Route::post('outflows/{id}', [OutflowController::class, 'update'])->name('outflows.update');
            Route::delete('outflows/{id}', [OutflowController::class, 'destroy'])->name('outflows.destroy');
        });
    }

);


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
