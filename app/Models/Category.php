<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    protected $table = 'categorys';

    protected $fillable = [ 'name', 'lang', 'ico' ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
