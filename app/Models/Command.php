<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Command extends Model
{
    use Notifiable;

    protected $table = 'commands';

    protected $fillable = [
        'command',
        'description',
        'category_id',
        'lang'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
