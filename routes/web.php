<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    phpinfo();
});

Route::get('/admin', function () {
    return view('dashboard.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');