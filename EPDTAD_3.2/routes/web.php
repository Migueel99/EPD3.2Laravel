<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
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

//ruta para el registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/', [App\Http\Controllers\InicioController::class, 'index'], function () {
    return view('inicio');
})->name('inicio');

Route::get('/test', function () {
    return view('dashboard');
})->name('test');

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth');

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);

Route::get('/perfil', [App\Http\Controllers\DireccioneController::class, 'perfil'], function () {
    return view('perfil');
})->name('perfil')->middleware(['auth']);
Route::get('/pagar', [App\Http\Controllers\UserController::class, 'checkout'], function () {
    return view('inicio');
})->name('pagar')->middleware(['auth']);

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout')->middleware(['auth']);

Route::get('/users', function () {
    return view('user.index');
})->name('users')->middleware(['auth', 'verified']);

Route::get('/cart', function () {
    return view('cart');
})->name('cart')->middleware(['auth', 'verified']);;
Route::view('/404', 'errors.404');


Route::get('/pedidosrealizados', function () {
    return view('pedidos');
})->name('pedidosrealizados')->middleware(['auth']);

Route::get('/favoritosusuario', function () {
    return view('favoritos');
})->name('favoritosusuario')->middleware(['auth']);

Route::get('/pcategoria/{idCategoria}', [App\Http\Controllers\ProductoController::class, 'productosPorCategoria'],function(){
    return view('pcategoria');
})->name('pcategoria')->middleware(['auth']);

Route::get('/cambiarpassword', function () {
    return view('cambiarcontrasena');
})->name('cambiarpassword')->middleware(['auth']);

Route::get('editarperfil',function(){
    return view('editarperfil');
})->name('editarperfil')->middleware(['auth']);


Route::resource('favoritos', App\Http\Controllers\FavoritoController::class)->middleware(['auth']);
Route::resource('producto-carrito', App\Http\Controllers\ProductoCarritoController::class)->middleware(['auth']);
Route::resource('producto-pedido', App\Http\Controllers\ProductoPedidoController::class)->middleware(['auth']);
Route::resource('pedidos', App\Http\Controllers\PedidoController::class)->middleware(['auth']);
Route::resource('direcciones', App\Http\Controllers\DireccioneController::class)->middleware(['auth']);
Route::resource('categoria-productos', App\Http\Controllers\CategoriaProductoController::class)->middleware(['auth']);

Route::resource('users', App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::resource('rols', App\Http\Controllers\RolController::class)->middleware(['auth', 'admin']);
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware(['auth']);
Route::resource('carritos', App\Http\Controllers\CarritoController::class)->middleware(['auth']);
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware(['auth', 'admin']);