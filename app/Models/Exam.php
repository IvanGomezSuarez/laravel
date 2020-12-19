<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_exam';
    protected $table = 'exams';
    public $timestamps = false;
    protected $fillable = [
        'id_class',
        'id_student',
        'name',
        'mark'

    ];


}
