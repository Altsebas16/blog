<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Mostrar todos los posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Mostrar formulario para crear un nuevo post
    public function create()
    {
        return view('posts.create');
    }

    // Almacenar un nuevo post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        // Guardar la imagen
        $imagePath = $request->file('image')->store('images', 'public');

        // Crear el post en la base de datos
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index');
    }
}
