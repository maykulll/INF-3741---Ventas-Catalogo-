<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Cliente\HomeController::class, 'index'])->name('cliente.home');