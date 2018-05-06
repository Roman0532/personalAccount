<?php

namespace App\Repositories;

use App\Document;

class DocumentRepository extends EloquentRepository implements DocumentInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели
     */
    public function getModel()
    {
        return new Document();
    }
}