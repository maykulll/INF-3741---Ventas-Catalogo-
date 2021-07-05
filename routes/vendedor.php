<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Vendedor\HomeController::class, 'index'])->name('vendedor.home');