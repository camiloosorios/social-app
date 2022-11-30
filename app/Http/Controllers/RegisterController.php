<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //Modificar la request
        $request -> request -> add(['username' => Str::slug($request -> get('username'))]);

        //Validaciones del formulario
        $this -> validate($request, [
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email| max:40',
            'password' => 'required|confirmed|min:6',
        ]);

        //Inserción del registro en la tabla users
        User::create([
            'name' => $request -> get('name'),
            'username' => $request -> get('username'),
            'email' => $request -> get('email'),
            //Encriptar contraseña con hash de una via
            'password' => Hash::make($request -> get('password')) 
        ]);

        //Autenticar al usuario
        auth() -> attempt($request -> only('email', 'password'));

        //Redireccionar al usuario
        return redirect() -> route('muro');
    }
}
