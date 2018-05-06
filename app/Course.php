<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use Notifiable;

    protected $fillable = [
        'id',
        'title'
    ];

    protected $hidden = [
    ];
}