<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
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

 
Route::resource('inicio', App\Http\Controllers\InicioController::class);

Route::get('/test', function () {
    return view('dashboard');
})->name('test');

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth');



Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);

Route::get('/users', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('users');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('rols', App\Http\Controllers\RolController::class);
    Route::resource('productos', App\Http\Controllers\ProductoController::class);
    Route::resource('carritos', App\Http\Controllers\CarritoController::class);
    Route::resource('producto_carritos', App\Http\Controllers\ProductoCarritoController::class);
    Route::resource('producto_pedidos', App\Http\Controllers\ProductoPedidoController::class);
    Route::resource('pedidos', App\Http\Controllers\PedidoController::class);
});
