@extends('layouts.app')

@section('titulo')
    Registrate en SocialAPP
@endsection

@section('contenido')

    <div class="md:flex md:justify-center md:items-center">

        <div class="md:w-6/12 md:gap-10 p-6">

            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">

            <form>

                <div class="mb-5">

                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" class="border p-3 w-full rounded-lg" placeholder="Tu nombre de usuario">
                </div>
                <div class="mb-5">

                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" class="border p-3 w-full rounded-lg" placeholder="Tu nombre">
                </div>
                <div class="mb-5">

                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" class="border p-3 w-full rounded-lg" placeholder="Tu Email de Registro">
                </div>
                <div class="mb-5">

                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" class="border p-3 w-full rounded-lg" placeholder="Password de Registro">
                </div>
                <div class="mb-5">

                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border p-3 w-full rounded-lg" placeholder="Repite tu Password">
                </div>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover bg-sky-700 transition-colors cursor-pointer upercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

@endsection