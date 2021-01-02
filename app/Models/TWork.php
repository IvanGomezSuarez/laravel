<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TWork extends Model
{
    use HasFactory;
    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_t_work';
    protected $table = 't_work';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'id_class'

    ];



}
