<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminalumn extends Model
{
    use HasFactory;
    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id';
    protected $table = 'students';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'pass',
        'email',
        'name',
        'surname',
        'telephone',
        'nif',
        'date_registered'

    ];
}
