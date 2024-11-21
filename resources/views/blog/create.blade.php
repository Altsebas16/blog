@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Título principal de bienvenida -->
        <h1 class="text-center text-3xl font-semibold mb-6">Bienvenidos a este Blog</h1>

        <h2 class="text-center text-2xl font-medium mb-6">Crear Nueva Publicación</h2>
        
        <!-- Mostrar mensajes de error si los hay -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear una nueva publicación -->
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            <div class="form-group mb-4">
                <label for="title" class="block text-lg font-medium text-gray-700">Título:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="input-field">
            </div>
            <div class="form-group mb-4">
                <label for="description" class="block text-lg font-medium text-gray-700">Descripción:</label>
                <textarea id="description" name="description" required class="input-field">{{ old('description') }}</textarea>
            </div>
            <div class="form-group mb-4">
                <label for="image" class="block text-lg font-medium text-gray-700">Imagen (opcional):</label>
                <input type="file" id="image" name="image" accept="image/*" class="input-field">
            </div>
            <button type="submit" class="submit-btn">Publicar</button>
        </form>

        <!-- Formulario para insertar un comentario -->
        <div class="comment-section mt-8">
            <h2 class="text-center text-2xl font-medium mb-6">Deja tu Comentario</h2>

            <!-- Formulario de comentario -->
            <form action="{{ route('comentarios.store') }}" method="POST" class="form-container">
                @csrf
                <div class="form-group mb-4">
                    <label for="comment" class="block text-lg font-medium text-gray-700">Comentario:</label>
                    <textarea id="comment" name="comment" required class="input-field"></textarea>
                </div>
                <button type="submit" class="submit-btn">Comentar</button>
            </form>
        </div>
    </div>

    <style>
        /* Estilos para contenedor general */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin-top: 40px;
        }

        h1, h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        /* Formulario principal */
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos de los campos de texto */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .input-field:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Estilo de botón */
        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        /* Sección de comentarios */
        .comment-section {
            margin-top: 40px;
        }

        /* Título de comentarios */
        .comment-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Mensajes de error */
        .bg-red-100 {
            background-color: #f8d7da;
        }

        .text-red-700 {
            color: #842029;
        }
    </style>
@endsection
