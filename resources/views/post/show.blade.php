@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Mostrar la publicación -->
        <div class="post">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
            <small>Publicado por: {{ $post->user->name }}</small>

            <!-- Aquí puedes agregar las imágenes, etiquetas o cualquier otro contenido relacionado con la publicación -->
        </div>

        <!-- Formulario de comentario -->
        <h3>Deja un comentario:</h3>
        <form action="{{ route('comentarios.store') }}" method="POST" class="form-container">
            @csrf
            <!-- Aquí estamos pasando el id del post -->
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="form-group">
                <label for="comment">Comentario:</label>
                <textarea id="comment" name="comment" required class="input-field">{{ old('comment') }}</textarea>
            </div>

            <button type="submit" class="submit-btn">Comentar</button>
        </form>

        <!-- Aquí se muestran los comentarios existentes -->
        <div class="comments mt-5">
            <h4>Comentarios:</h4>
            @foreach ($post->comments as $comment)
                <div class="comment mt-3">
                    <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}</p>
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>
    </div>
@endsection
