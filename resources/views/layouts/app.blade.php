<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SocialAPP - @yield('titulo')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-200">

        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center"> 

                <h1 class="text-3xl font-black">SocialAPP</h1>
                <nav class="flex gap-2 items-center">
                    @auth
                        <a href="/muro" class="font-bold text-gray-600 text-sm mx-5">Hola <span class="font-normal">{{ auth() -> user() -> username }}</span></a>
                        <form action="{{ route('logout') }}" method="POST">

                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">CERRAR SESIÓN</button/>
                        </form>
                    @endauth
                    @guest
                    
                        <a href="/login" class="font-bold uppercase text-gray-600 text-sm mx-5">Login</a>
                        <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
                    @endguest
                </nav>
            </div>
        </header>
        <main class="container mx-auto mt-10">

            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        <footer class="text-center p-5 text-gray-500 font-bold mt-10">

            SocialAPP - Todos los derechos reservados {{ now() -> year }}
        </footer>
    </body>
</html>
