@extends('layouts.app')

@section('content')
    <style>
        /* Contenedor principal del blog */
        .blog-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Título del blog */
        .blog-title {
            font-size: 36px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Botón para crear una nueva publicación */
        .create-post-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .create-post-btn:hover {
            background-color: #45a049;
        }

        /* Contenedor de las publicaciones */
        .posts-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Tarjetas de las publicaciones */
        .post-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Título de cada publicación */
        .post-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        /* Imagen de la publicación */
        .post-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* Descripción de la publicación */
        .post-description {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        /* Autor de la publicación */
        .post-author {
            font-size: 14px;
            color: #888;
            text-align: right;
        }
    </style>

    <div class="blog-container">
        <h1 class="blog-title">Blog</h1>
        <a href="{{ route('blog.create') }}" class="create-post-btn">Crear Nueva Publicación</a>

        <div class="posts-container">
            @foreach ($posts as $post)
                <div class="post-card">
                    <h2 class="post-title">{{ $post->title }}</h2>

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
                    @endif

                    <p class="post-description">{{ $post->description }}</p>

                    <small class="post-author">
                        Publicado por: {{ $post->user->name ?? auth()->user()->name }}
                    </small>
                </div>
            @endforeach
        </div>
    </div>
@endsection

