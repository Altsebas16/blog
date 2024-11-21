@extends('layouts.app')

@section('content')
    <!-- Título más pequeño y centrado -->
    <h1 class="text-center text-3xl font-semibold mb-6">Comentarios</h1>
    
    <!-- Contenedor con estilo para los comentarios -->
    <div class="post-container bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto mb-8">
        <!-- Aquí puedes mostrar los comentarios de manera organizada -->
        <p class="post-content text-lg text-gray-700">Aquí aparecerán los comentarios...</p>
    </div>
@endsection

@push('styles')
    <style>
        /* Titulo centrado y más pequeño */
        h1 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilo de los contenedores de los comentarios */
        .post-container {
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Estilo para el contenido de los comentarios */
        .post-content {
            font-size: 1.125rem;
            line-height: 1.6;
            color: #333;
        }
    </style>
@endpush
