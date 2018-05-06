<?php

namespace App\Repositories;

use App\Teacher;

class TeacherRepository extends EloquentRepository implements TeacherInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели
     */
    public function getModel()
    {
        return new Teacher();
    }
}