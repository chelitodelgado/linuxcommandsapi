<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UsuarioRol extends Model
{
    use Notifiable;

    protected $table = 'rol_usuario';

    protected $fillable = [ 'user_id', 'rol_id' ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];
}
