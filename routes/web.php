<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\LevelController;
use App\Http\Controllers\Dashboard\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard.layouts.app');
    })->name('dashboard');

    Route::get('/users/ajax', [UserController::class, 'getUser'])->name('users.getUsers');

    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
    Route::post('/levels', [LevelController::class, 'store'])->name('levels.store');
    Route::put('/levels/{level}', [LevelController::class, 'update'])->name('levels.update');
    Route::delete('/levels/{level}', [LevelController::class, 'destroy'])->name('levels.destroy');
    Route::get('/levels/ajax', [LevelController::class, 'getLevel'])->name('levels.getLevels');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::get('/tags/ajax', [TagController::class, 'getTags'])->name('tags.getTags');

    Route::resource('/courses', CourseController::class)->except('show');
});