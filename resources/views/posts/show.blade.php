@extends('layouts.app')

@section('titulo')
    {{$post -> titulo}}
@endsection

@section('contenido')

    <div class="container mx-auto md:flex">

        <div class="md:w-1/2">

            <img src="{{ asset('/uploads') . '/' .$post -> imagen }}" alt="Imagen del post {{ $post -> titulo }}">
            <div class="p-3 flex items-center gap-4">
                @auth    
                    @if ($post -> checkLike(auth() -> user()))
                        <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">                                
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>              
                    @else
                        <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                            @csrf
                            <div class="my-4">
                                <button type="submit">                                
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif                
                @endauth
                <p>{{ $post -> like ->count() }} Likes</p>
            </div>
            <div>
                <p class="font-bold">{{ $post -> user -> username }}</p>
                <p class="text-sm text-gray-500">{{ $post -> created_at -> diffForHumans() }} </p>
                <p class="m-2">{{ $post -> descripcion }}</p>
            </div>
            @auth
                @if ($post -> user_id == auth()-> user() -> id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer" value="Eliminar publicación">
                    </form>                    
                @endif                
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            @auth
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">Comentarios</p>

                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div>                    
                @endif

                <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
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
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post ->comentario->count())
                        @foreach ($post->comentario as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario -> user) }}" class="font-bold">
                                    {{ $comentario -> user -> username }}
                                </a>
                                <p>{{ $comentario -> comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario -> created_at -> diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center mt-10"> No hay comentarios aún</p>
                    @endif
                </div>
            </div>                
        </div>
    </div>

@endsection