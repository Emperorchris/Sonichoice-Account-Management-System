<?php

use App\Http\Controllers\AccountEntryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




// Route::get('/', function () {
//     return Inertia::render('Auth/Register', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware(middleware: ['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');


// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/entry', [AccountEntryController::class, 'index'])->name('entry.index');
    Route::post('/entry', [AccountEntryController::class, 'store'])->name('entry.store');
    Route::get('/entry/edit/{id}', [AccountEntryController::class, 'edit'])->name('entry.edit');
    Route::put('/entry/update/{accountEntry}', [AccountEntryController::class, 'update'])->name('entry.update');
    Route::delete('/entry/delete/{accountEntry}', [AccountEntryController::class, 'destroy'])->name('entry.destroy');
    Route::get('/all-entries', [AccountEntryController::class, 'all'])->name('entry.all');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
