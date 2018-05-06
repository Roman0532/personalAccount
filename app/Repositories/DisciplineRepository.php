<?php

namespace App\Repositories;

use App\Discipline;

class DisciplineRepository extends EloquentRepository implements DisciplineInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели
     */
    public function getModel()
    {
        return new Discipline();
    }
}