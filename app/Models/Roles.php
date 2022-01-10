<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Roles extends Model
{
    use Notifiable;

    protected $table = 'roles';

    protected $fillable = [ 'role' ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

}
