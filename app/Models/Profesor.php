<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_teacher';
    protected $table = 'teachers';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'telephone',
        'nif',
        'email',
        'asignado'

    ];

}
