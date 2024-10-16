<?php

use App\Enums\UserType;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeachingAssistantController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testing', function () {
    return view('testing');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->user_type == UserType::STUDENT) {
            return redirect()->intended(route('student.dashboard', absolute: false));
        } else if (auth()->user()->user_type == UserType::LECTURER) {
            return redirect()->intended(route('lecture.dashboard', absolute: false));
        }
        return redirect()->intended(route('operator.dashboard', absolute: false));
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/class-list', function () {
        return view('class-list');
    });
});

Route::middleware(['auth', 'user_type:student'])->prefix('student')->group(function () {
    Route::get('', function () {
        return view('dashboard.student.index');
    })->name('student.dashboard');
    route::resource('/teaching-assistant-registration', TeachingAssistantController::class)->names('student.ta-registration');
});

Route::middleware(['auth', 'user_type:operator'])->prefix('operator')->group(function () {
    Route::get('', function () {
        return view('dashboard.operator.index');
    })->name('operator.dashboard');
    Route::resource('user-management', UserManagementController::class)->names('operator.user-management');
});

Route::middleware(['auth', 'user_type:lecturer'])->prefix('lecturer')->group(function () {
    Route::get('', function () {
        return view('dashboard.lecturer.index');
    })->name('lecture.dashboard');
});

require __DIR__ . '/auth.php';
