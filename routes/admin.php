<?php

use App\Http\Controllers\Admin\AlmacenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\UsuarioController;
/* Route::get('/', function () {
    return 'welcome admin';
})->name('admin.home'); */

Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::resource('/products', ProductController::class)->names('products');
Route::post('/productimage', [App\Http\Controllers\Admin\ProductController::class, 'saveImage']);//->name('poductimage');

Route::resource('/almacen', AlmacenController::class)->names('admin.almacen');
Route::resource('/ventas', VentaController::class)->names('admin.venta');
Route::resource('/pedidos', PedidoController::class)->names('admin.pedido');
Route::resource('/usuarios', UsuarioController::class)->names('admin.usuario');


