<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Crea un campo 'id' para el comentario
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Crea una columna 'user_id' para referir al usuario
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Crea una columna 'post_id' para referir al post
            $table->text('comment'); // Crea una columna 'comment' para almacenar el texto del comentario
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
