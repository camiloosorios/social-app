<div>
    @if ($posts -> count())
        <div class="grid md:grif-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div class="mt-3">
                    <a href="{{ route('posts.show',['post' => $post, 'user' => $post -> user]) }}"> <!--Se envian los parametros hacia la ruta-->
                        <img src="{{ asset('uploads') . '/' . $post -> imagen }}" alt="Imagen del post {{$post -> titulo}}">
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No hay posts, sigue a alguien para poder mirar sus publicaciones</p>
    @endif
</div>