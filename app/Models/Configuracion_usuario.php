<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion_usuario extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_user_admin';
    protected $table = 'users_admin';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'name',
        'email',
        'password'

    ];

}
