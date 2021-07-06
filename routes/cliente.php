<?php

use App\Http\Controllers\Cliente\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Cliente\HomeController::class, 'index'])->name('cliente.home');
Route::resource('/productos', ProductoController::class)->names('cliente.producto');