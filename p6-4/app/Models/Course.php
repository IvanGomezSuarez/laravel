<?php
/* modelo de courses */
namespace App\Models;

/* añadido por mi */


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;


    /* le decimos cual es la clave primaria de la tabla*/
    protected $primaryKey = 'id_course';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'date_start',
        'date_end',
        'active'

    ];
}
