<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    
    public function __construct()
    {
        //Proteger ruta con el middleware auth
        $this -> middleware('auth');

    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //Modificar la Request para evitar espacios
        $request -> request -> add(['username' => Str::slug($request-> username)]);

        $this -> validate($request, [
            
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:editar-perfil,twitter'],
            'email' => ['required','unique:users,email,'.auth()->user()->id,'max:40'],
            'password' => 'required|min:6',
            'password2' => 'nullable|min:6'
            
        ]);
        
        //Validamos la contraseña ingresada
        if(!auth() -> attempt($request -> only('password'))) {

            //En caso de error en las credenciales devuelve un mensaje
            return back() -> with('mensaje', 'Contraseña incorrecta');

        }

        //Preparación de imagen
        if($request -> imagen){

            //Almacena en una variable la imagen
            $imagen = $request -> file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen -> extension();

            //Se crea imagen que sera guardada en el servidor
            $imagenServidor = Image::make($imagen);

            //Tamaño de la imagen en pixeles
            $imagenServidor -> fit(1000, 1000);

            //Apunta a la ruta publica y crea la carpeta uploads
            $imagenPath = public_path('perfiles') . "/" . $nombreImagen;

            //Se guarda la imagen en el path especificado
            $imagenServidor -> save($imagenPath);

        }

        $usuario = User::find(auth()->user()->id); //Busca el usuario en base de datos

        //Validar que viene contraseña nueva
        if($request -> password2){

            $usuario -> password = Hash::make($request -> password2); // Se actualiza el password

        }

        $usuario -> username = $request -> username; //Se actualiza el nombre de usuario
        $usuario -> imagen = $nombreImagen ?? auth()-> user() -> imagen ?? ''; //Se actualiza la imagen
        $usuario -> email = $request -> email ?? auth() -> user() -> email; //Se actualiza el email
        
        //Actualizamos la información
        $usuario -> save();

        //Redireccionar al muro
        return redirect() -> route('posts.index', $usuario -> username);
    }
    
}
