<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Discipline extends Model
{
    use Notifiable;

    protected $fillable = [
        'id',
        'title',
        'teacher_id'
    ];

    protected $hidden = [
    ];
}