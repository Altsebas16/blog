<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Método para mostrar la lista de publicaciones
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('blog.create');
    }

    // Método para guardar una nueva publicación
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Manejo de la imagen (si se sube)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Crear el post en la base de datos
        Post::create([
            'title' => $request->title,
            'description' => $request->description, // Cambia 'description' a 'content' si ese es el nombre en tu tabla
            'image' => $imagePath,
            
        ]);

        // Redirigir a la vista del índice del blog con un mensaje de éxito
        return redirect()->route('blog.index')->with('success', 'Publicación creada exitosamente.');
    }
}

        
