<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoCarritoController;
use App\Http\Controllers\ProductoPedidoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DescuentoController;


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
Route::resource('user', UserController::class);
Route::resource('rol', RolController::class);
Route::resource('producto', ProductoController::class);
Route::resource('carrito', CarritoController::class);
Route::resource('producto_carrito', ProductoCarrito::class);
Route::resource('producto_pedido', ProductoPedido::class);
Route::resource('pedido', PedidoController::class);
Route::resource('descuento', DescuentoController::class);

});
    
    Route::resource('user', UserController::class);
    Route::resource('rol', RolController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('carrito', CarritoController::class);
    Route::resource('producto_carrito', ProductoCarrito::class);
    Route::resource('producto_pedido', ProductoPedido::class);
    Route::resource('pedido', PedidoController::class);
    Route::resource('descuento', DescuentoController::class);
