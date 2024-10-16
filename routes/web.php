<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeachingAssistantController;
use App\Http\Controllers\UserManagementController;
use App\Models\TeachingAssistant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::get('/testing', function () {return view('testing');});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/class-list', function () {return view('class-list');});
});

Route::middleware(['auth', 'user_type:student'])->prefix('student')->group(function () {
    Route::get('', function () {
        return view('dashboard.student.index');
    })->name('student.dashboard');
    route::resource('/teaching-assistant-registration',TeachingAssistantController::class)->names('student.ta-registration');

//    Route::get('/ta-registration', function () {
//        return view('ta-registration');
//    })->name('ta-registration');
});

Route::middleware(['auth','user_type:operator'])->prefix('operator')->group(function () {
    Route::get('', function () {
        return view('dashboard.operator.index');
    })->name('operator.dashboard');
    Route::resource('user-management',UserManagementController::class)->names('operator.user-management');
});

require __DIR__ . '/auth.php';
