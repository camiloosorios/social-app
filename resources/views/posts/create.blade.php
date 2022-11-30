@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    
@endpush

@section('contenido')

    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">

            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-10 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 md:w-4/12 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            
            <form action="{{ route('register') }}" method="POST" novalidate>
                <!---- Crea token de seguridad --->
                @csrf 
                <div class="mb-5">

                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                    <input  type="text" 
                            id="titulo" 
                            name="titulo" 
                            placeholder="Título de la publicación" 
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
                            value="{{ old('name') }}">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">

                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea   id="description" 
                                name="description" 
                                placeholder="Descripción de la publicación" 
                                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">
                    </textarea>
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear Publicación" class="bg-sky-600 hover bg-sky-700 transition-colors cursor-pointer upercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

@endsection