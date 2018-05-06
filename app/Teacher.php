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
        'login',
        'password',
        'remember_token',
        'email'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documents()
    {
        return $this->belongsTo(Document::class,'id','teacher_id');
    }

}