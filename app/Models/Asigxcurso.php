<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asigxcurso extends Model
{
    use HasFactory;



    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_class';
    protected $table = 'class';
    public $timestamps = false;
    protected $fillable = [
        'id_course'

    ];

}
