<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        //Almacena en una variable la imagen
        $imagen = $request -> file('file');

        $nombreImagen = Str::uuid() . "." . $imagen -> extension();

        //Se crea imagen que sera guardada en el servidor
        $imagenServidor = Image::make($imagen);

        //Tamaño de la imagen en pixeles
        $imagenServidor -> fit(1000, 1000);

        //Apunta a la ruta publica y crea la carpeta uploads
        $imagenPath = public_path('uploads') . "/" . $nombreImagen;

        //Se guarda la imagen en el path especificado
        $imagenServidor -> save($imagenPath);

        //Devolver en la respuesta la extensión de la imagen
        return response() -> json(['imagen' => $nombreImagen]);

    }
}
