<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        //Se ejecuta el middleware de autenticación
        $this -> middleware('auth') -> except(['show', 'index']);
    }

    public function index(User $user)
    {

        //Realizar consulta a la DB para traer las publicaciones del usuario logeado
        // $posts = Post::where('user_id', $user -> id) -> get(); Get trae los datos de la consulta realizada
        $posts = Post::where('user_id', $user -> id) -> paginate('20'); //paginate realiza la paginación de la consulta realizada

        //Devuelve la vista del muro
        return view('dashboard', [
            'user' => $user, //Devuelve la información del perfil de usuario
            'posts' => $posts //Devuelve las publicaciones realizadas por el usuario
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $this -> validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        //Opción 1 creando post sin relacion
        // Post::create([

        //     'titulo' => $request -> titulo,
        //     'descripcion' => $request -> descripcion,
        //     'imagen' => $request -> imagen,
        //     'user_id' => auth() -> user() -> id

        // ]);

        //Opción 2 creando post con la relación
        $request -> user() -> posts() -> create([
            'titulo' => $request -> titulo,
            'descripcion' => $request -> descripcion,
            'imagen' => $request -> imagen,
            'user_id' => auth() -> user() -> id
        ]);

        return redirect() -> route('posts.index', auth() -> user() -> username);

    }

    public function show(User $user, Post $post)
    {
        //Se pasan los parametros user y post para ser utilizados en la vista
        return view('posts.show', [
            'user' => $user,
            'post' => $post
        ]);
    }
    
    public function destroy(Post $post)
    {
        if($post -> user_id == auth() -> user() -> id){
            
        }
    }
}
