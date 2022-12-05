<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
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
Route::post('/register', [RegisterController::class, 'store']) -> name('register');

//Método GET, trae la vista del login de usuario
Route::get('/login', [LoginController::class, 'index']) -> name('login');
//Método POST para logearse
Route::post('/login', [LoginController::class, 'store']) -> name('login');

//Ruta para modificar el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index']) -> name('perfil.index');

//Ruta para enviar la información del eprfil actualizada
Route::post('/editar-perfil', [PerfilController::class, 'store']) -> name('perfil.store');

//Método GET, trae la vista del muro una vez el usuario se ha autenticado
Route::get('/{user:username}', [PostController::class, 'index']) -> name('posts.index');

//Método GET, creación de posts
Route::get('/posts/create', [PostController::class, 'create']) -> name('posts.create');

//Método POST, para guardar publicaciones en DB
Route::post('/posts', [PostController::class, 'store']) -> name('posts.store');

//Método GET, para cargar vista de imagen publicada
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show']) -> name('posts.show');

//Método POST, para guardar los comentarios en base de datos
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store']) -> name('comentarios.store');

//Método POST, cierra la sesión del usuario
Route::post('/logout', [LogoutController::class, 'store']) -> name('logout');

//Método DELETE, borrar una publicación
Route::delete('/posts/{post}', [PostController::class, 'destroy']) -> name('posts.destroy');

//Método POST, para cargar imagen a dropzone
Route::post('/imagenes', [ImagenController::class, 'store']) -> name('imagenes.store');

//Like a las fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store']) -> name('posts.likes.store');

//Quitar Like a las fotos
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy']) -> name('posts.likes.destroy');

//Seguir usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store']) -> name('users.follow');

//Dejar de seguir usuarios
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy']) -> name('users.unfollow');




