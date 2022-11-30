@extends('layouts.app')

@section('titulo')
    Perfil : {{ $user -> username }}
@endsection

@section('contenido')

    <div class="flex justify-center">

        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">

            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/user.png') }}" alt="Imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <div class="flex flex-col justify-start">
                    <p class="text-gray-700 text-2xl">{{ $user -> username }}</p>
                    <p class="text-gray-800 text-sm mt-3 font-bold">
                        0<span class="font-normal ml-2">Seguidores</span>
                    </p>
                    <p class="text-gray-800 text-sm mt-2 font-bold">
                        0<span class="font-normal ml-2">Siguiendo</span>
                    </p>
                    <p class="text-gray-800 text-sm mt-2 font-bold">
                        0<span class="font-normal ml-2">Posts</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection