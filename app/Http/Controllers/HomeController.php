<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function __invoke()
    {
        //Obtener los id de a quien sigue
        $ids = auth()->user()->followings->pluck('id')->toArray();

        //Verificar en la tabla post los user_id de las personas que sigue
        $posts = Post::whereIn('user_id', $ids)->orderBy('created_at', 'desc')->paginate(20);

        //Pasamos los Posts a la vista de home
        return view('home', [
            'posts' => $posts
        ]);
    }
    
}
