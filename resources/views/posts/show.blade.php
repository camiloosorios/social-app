@extends('layouts.app')

@section('titulo')
    {{$post -> titulo}}
@endsection

@section('contenido')

    <div class="container mx-auto flex">

        <div class="md:w-1/2">

            <img src="{{ asset('/uploads') . '/' .$post -> imagen }}" alt="Imagen del post {{ $post -> titulo }}">
            <div>
                <p class="p-3">0 likes</p>
            </div>
            <div>
                <p class="font-bold">{{ $post -> user -> username }}</p>
                <p class="text-sm text-gray-500">{{ $post -> created_at -> diffForHumans() }} </p>
                <p class="m-2">{{ $post -> descripcion }}</p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            @auth
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">Comentarios</p>
                <form action="" method="POST">
                    @csrf
                    <div class="mb-5">

                        <label for="comentario" class="font-bold text-gray-500 uppercase text-sm pl-2">Añade un nuevo comentario</label>
                        <textarea   id="comentario" 
                                    name="comentario" 
                                    placeholder="Agregar comentario..." 
                                    class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                        ></textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Comentar" class="bg-sky-600 hover bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
            </div>                
            @endauth
        </div>
    </div>

@endsection