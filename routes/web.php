<?php

use App\Http\Controllers\ProfileController;



use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('blog', App\Http\Controllers\BlogController::class);
    Route::post('/comentarios/store', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store');
    Route::get('comentarios/{postId}', [App\Http\Controllers\ComentarioController::class, 'index'])->name('comentarios.index');

// Ruta para mostrar el formulario de comentarios y guardarlos
Route::post('/comentarios', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store');


    // Ruta para almacenar un comentario
    Route::post('/comentarios/store', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store');
    
// Asegúrate de que tienes este controlador o crea uno si lo necesitas.


// Definir la ruta para comentarios
Route::get('/comentarios', [App\Http\Controllers\ComentarioController::class, 'index'])->name('comentarios');


Route::middleware(['auth'])->group(function () {
    Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
});

});

require __DIR__.'/auth.php';
