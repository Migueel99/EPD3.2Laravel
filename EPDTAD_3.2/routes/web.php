<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth');

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('rols', App\Http\Controllers\RolController::class);
    Route::resource('productos', App\Http\Controllers\ProductoController::class);
    Route::resource('carritos', App\Http\Controllers\CarritoController::class);
    Route::resource('producto_carritos', App\Http\Controllers\ProductoCarrito::class);
    Route::resource('producto_pedidos', App\Http\Controllers\ProductoPedido::class);
    Route::resource('pedidos', App\Http\Controllers\PedidoController::class);
    Route::resource('descuentos', App\Http\Controllers\DescuentoController::class);
});
