<?php

use App\Http\Controllers\Dashboard\LevelController;
use App\Http\Controllers\Dashboard\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/admin/levels', LevelController::class);

Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard.layouts.app');
    })->name('dashboard');

    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
    Route::post('/levels', [LevelController::class, 'store'])->name('levels.store');
    Route::get('/levels/{level}', [LevelController::class, 'show'])->name('levels.show');
    Route::put('/levels/{level}', [LevelController::class, 'update'])->name('levels.update');
    Route::delete('/levels/{level}', [LevelController::class, 'destroy'])->name('levels.destroy');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');


});