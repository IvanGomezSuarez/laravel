<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_work';
    protected $table = 'works';
    public $timestamps = false;
    protected $fillable = [
        'id_class',
        'id_student',
        'name',
        'mark'

    ];
}
