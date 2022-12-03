<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        //Devuelve la vista del login
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //Validamos que el formulario esté diligenciado correctamente
        $this -> validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Validamos que las credenciales sean correctas
        if(!auth() -> attempt($request -> only('email', 'password'), $request -> remember)) {

            //En caso de error en las credenciales devuelve un mensaje
            return back() -> with('mensaje', 'Credenciales incorrectas');

        }

        //En caso de que las credenciales sean correcta redirige al muro
        return redirect() -> route('posts.index', [auth() -> user() -> username]);
    }
}
