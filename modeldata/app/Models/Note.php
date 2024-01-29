<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // protected $table = 'notes'; //para cuando la migracion y la clase tienen diferentes nombres

    protected $fillable = [
        "title", 
        "description", 
        "valor", 
        "done"
    ]; // indicar que campos pueden ser manipulados

    //protected $guarded = []; //campos vamos a proteger

    // protected $casts = []; // realizar casting de datos
    //protected $hidden = ["passwords"]; //ocultar datos cuando serializamos como contraseñas
}
