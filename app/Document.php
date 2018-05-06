<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Document extends Model
{
    protected $fillable = [
        'id',
        'teacher_id',
        'discipline_id',
        'theoretical_material',
        'practical_material',
        'semester_work',
        'coursework',
        'independent_work',
        'fos',
        'other',
        'course_id'
    ];

    protected $hidden = [
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
