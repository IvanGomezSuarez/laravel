<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminmatriculas extends Model
{
    use HasFactory;
    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_enrollment';
    protected $table = 'enrollment';
    public $timestamps = false;
    protected $fillable = [
        'id_student',
        'id_course'

    ];

}
