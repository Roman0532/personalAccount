<?php
namespace App\Repositories;

use App\Course;

class CourseRepository extends EloquentRepository implements CourseInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели
     */
    public function getModel()
    {
        return new Course();
    }
}
