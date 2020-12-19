<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificable extends Model
{
    use HasFactory;

    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_percentage';
    protected $table = 'percentage';
    public $timestamps = false;
    protected $fillable = [
        'id_course',
        'id_class',
        'continuous_assessment',
        'exams'

    ];
}
