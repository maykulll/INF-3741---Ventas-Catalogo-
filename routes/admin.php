<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return 'welcome admin';
})->name('admin.home'); */

Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
