<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;


    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_schedule';
    protected $table = 'schedule';
    public $timestamps = false;
    protected $fillable = [
        'id_class',
        'time_start',
        'time_end',
        'day'

    ];


}
