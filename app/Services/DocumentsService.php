<?php

namespace app\Services;

use App\Repositories\DocumentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsService
{

    /**
     * @param Request $request
     * @param DocumentInterface $documentRepository
     */
    public function deleteDocument($request, $documentRepository)
    {
        if ($request->input('delete')) {
            $column = $request->input('column_name');
            if ($file = $documentRepository->findOneBy([['id', (int)$request->input('id')]])->$column) {
                unlink('../public/' . Storage::url($file));
            }
            $documentRepository->update('id', (int)$request->input('id'), [$column => null]);
        }
    }

    /**
     * @param Request $request
     * @param DocumentInterface $documentRepository
     */
    public function uploadData($request, $documentRepository)
    {
        if ($request->input('add_discipline') != null) {
            $documentRepository->update('id', (int)$request->input('id'),
                [$request->input('column_name') => (int)$request->input('discipline')]);
        }

        if ($request->input('add_course') != null) {
            $documentRepository->update('id', (int)$request->input('id'),
                [$request->input('column_name') => (int)$request->input('course')]);
        }
    }

    /**
     * @param Request $request
     * @param DocumentInterface $documentRepository
     */
    public function uploadDocument($request, $documentRepository)
    {
        if ($request->file('file')) {
            $filename = md5(time() . $request->file('file')) . '.' . $request->file('file')->guessExtension();
            $request->file('file')->move('storage/', $filename);

            $documentRepository->update('id', (int)$request->input('id'),
                [$request->input('column_name') => $filename]);
        }
    }
}