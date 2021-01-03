<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TExam extends Model
{
    use HasFactory;


    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_t_exam';
    protected $table = 't_exam';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'id_class'

    ];

}
