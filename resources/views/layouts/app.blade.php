<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Barra de navegación */
            .navbar {
                background-color: #1e2a47; /* Color oscuro */
                color: white;
                padding: 15px 30px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .navbar .logo {
                font-size: 24px;
                font-weight: bold;
                color: white;
                text-transform: uppercase;
            }

            .nav-links {
                display: flex;
                gap: 20px;
            }

            .nav-item {
                color: white;
                text-decoration: none;
                font-size: 18px;
                font-weight: 500;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .nav-item:hover {
                background-color: #34495e;
                transform: scale(1.1);
            }

            @media (max-width: 768px) {
                .navbar {
                    flex-direction: column;
                    text-align: center;
                }
                .nav-links {
                    flex-direction: column;
                    gap: 10px;
                }
            }

            /* Títulos más pequeños */
            h1 {
                font-size: 28px; /* Título principal más pequeño */
                font-weight: 600;
            }

            h2 {
                font-size: 22px; /* Título de la publicación más pequeño */
                font-weight: bold;
            }

            /* Estilo para las publicaciones */
            .post-container {
                max-width: 700px; /* Contenedor más pequeño */
                margin: 20px auto; /* Centrar el contenido */
                padding: 10px;
                border-radius: 8px;
                background-color: #f9f9f9;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .post-content {
                font-size: 16px; /* Descripción más pequeña */
                line-height: 1.6;
                margin-top: 10px;
            }

            /* Para pantallas pequeñas (móviles) */
            @media (max-width: 768px) {
                h1 {
                    font-size: 22px;
                }
                .post-container {
                    max-width: 90%;
                    padding: 15px;
                }
            }

        </style>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Barra de navegación -->
            <nav class="navbar">
                <div class="logo">Mi Blog</div>
                <div class="nav-links">
                    <!-- Enlace al blog -->
                    <a href="{{ route('blog.index') }}" class="nav-item">Blog</a>
                    <!-- Si deseas agregar la opción de 'Comentarios' -->
                    <a href="{{ route('comentarios') }}" class="nav-item">Comentarios</a>
                </div>
            </nav>

            <!-- Incluye la navegación que ya tienes -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </body>
</html>
