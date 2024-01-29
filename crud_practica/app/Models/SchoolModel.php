<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolModel extends Model
{
    use HasFactory;

    protected $table='schools';

    protected $fillable = [
        'name',
        'description',
        'cant_student' 
    ];

    protected $hidden = [
        'cant_student'
    ];
}
