<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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
    return view('principal');
});

//Método GET, trae la vista de Registro de usuario
Route::get('/register', [RegisterController::class, 'index']) -> name('register');
//Método POST, envia el formulario y realiza el registro en BD
Route::post('/register', [RegisterController::class, 'store']);

//Método GET, trae la vista del login de usuario
Route::get('/login', [LoginController::class, 'index']) -> name('login');
//Método POST para logearse
Route::post('/login', [LoginController::class, 'store']) -> name('login');

//Método GET, trae la vista del muro una vez el usuario se ha autenticado
Route::get('/{user:username}', [PostController::class, 'index']) -> name('muro');

//Método POST, cierra la sesión del usuario
Route::post('/logout', [LogoutController::class, 'store']) -> name('logout');
