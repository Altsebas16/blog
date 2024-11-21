<?php

namespace App\Http\Controllers;

use App\Models\Comment;  // Asegúrate de importar el modelo Comment
use App\Models\Post;     // Importa el modelo Post si no está importado
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index($postId)
    {
        // Obtener todos los comentarios del post
        $comments = Comment::where('post_id', $postId)->get();

        // Pasar los comentarios a la vista
        return view('comentarios.index', compact('comments'));
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'comment' => 'required|string|max:500',
            'post_id' => 'required|exists:posts,id',  // Verifica que el post_id exista
        ]);

        // Guardar el comentario
        $comment = new Comment();
        
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
       
        $comment->save();

        // Redirigir de vuelta a la publicación con mensaje de éxito
        return redirect()->route('blog.show', $request->post_id)
                         ->with('success', 'Comentario publicado');
    }
}
