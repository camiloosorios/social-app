<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:editar-perfil,twitter']

        ]);

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

        //Guardar cambios
        $usuario = User::find(auth()->user()->id); //Busca el usuario en base de datos

        $usuario -> username = $request -> username; //Se actualiza el nombre de usuario
        $usuario -> imagen = $nombreImagen ?? ''; //Se actualiza la imagen

        $usuario -> save();

        //Redireccionar al muro
        return redirect() -> route('posts.index', $usuario -> username);
    }
    
}
