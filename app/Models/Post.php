<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar masivamente
    protected $fillable = ['title', 'description', 'user_id', 'image'];

    /**
     * Relación con el modelo User.
     * Un post pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

