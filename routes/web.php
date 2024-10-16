<?php

use App\Enums\UserType;
use App\Http\Controllers\CourseClassController;
use App\Models\TeachingAssistantLog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TeachingAssistantController;
use App\Http\Controllers\TeachingAssistantLogController;

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
        return view('class-list',['classes' => \App\Models\CourseClass::all()]);
    })->name('class-list');
});

Route::middleware(['auth', 'user_type:student'])->prefix('student')->group(function () {
    Route::get('', function () {
        return view('dashboard.student.index');
    })->name('student.dashboard');
    route::resource('/teaching-assistant-registration', TeachingAssistantController::class)->names('student.ta-registration');
    Route::resource('/teaching-assistant-log', TeachingAssistantLogController::class)->names('student.ta-log');
    Route::get('/teaching-assistant-log/{teaching_assistant}/data', [TeachingAssistantLogController::class, 'data'])->name('student.ta-log.data');;
    Route::get('/teaching-assistant-log/{teaching_assistant}/create', [TeachingAssistantLogController::class, 'create'])->name('student.ta-log.create');
});

Route::middleware(['auth', 'user_type:operator'])->prefix('operator')->group(function () {
    Route::get('', function () {
        return view('dashboard.operator.index');
    })->name('operator.dashboard');
    Route::resource('user-management', UserManagementController::class)->names('operator.user-management');

    Route::get('/class/add-lecture-to-class',[CourseClassController::class,'addLecture'])->name('add.lecture.to.class');
    Route::post('/class/add-lecture-to-class',[CourseClassController::class,'storeLecture'])->name('add.lecture');
    Route::get('/class/add-lecture-to-class/{course_class:id}',[CourseClassController::class,'editLecture'])->name('edit.lecture');
    Route::put('/class/add-lecture-to-class/{course_class:id}',[CourseClassController::class,'updateLecturer'])->name('update.lecture');
    Route::resource('class',\App\Http\Controllers\CourseClassController::class)->names('operator.class')->except('show');

});

Route::middleware(['auth', 'user_type:lecturer'])->prefix('lecturer')->group(function () {
    Route::get('', function () {
        return view('dashboard.lecturer.index');
    })->name('lecture.dashboard');

    Route::get('/teaching-assistant', [TeachingAssistantController::class, 'lectureTeachingAssistantIndex'])->name('lecture.teaching-assistant');
});

require __DIR__ . '/auth.php';
