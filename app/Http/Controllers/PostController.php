<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        //Se ejecuta el middleware de autenticación
        $this -> middleware('auth');
    }

    public function index(User $user)
    {
        //Devuelve la vista del muro
        return view('dashboard', [
            'user' => $user
        ]);
    }
}
