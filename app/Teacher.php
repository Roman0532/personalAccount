<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id',
        'full_name',
        'name',
        'password',
        'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documents()
    {
        return $this->belongsTo(Document::class,'id','teacher_id');
    }

}