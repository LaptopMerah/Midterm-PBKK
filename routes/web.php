<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeachingAssistantController;
use App\Models\TeachingAssistant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/class-list', function () {return view('class-list');});
});

Route::middleware(['auth', 'user_type:student'])->group(function () {
    route::resource('/pendaftaran',TeachingAssistantController::class);
    Route::get('/ta-registration', function () {
        return view('ta-registration');
    })->name('ta-registration');
});

require __DIR__ . '/auth.php';
