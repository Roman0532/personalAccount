<?php

namespace app\Services;

use App\Repositories\DocumentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsService
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var DocumentInterface
     */
    private $documentRepository;

    /**
     * DocumentsService constructor.
     * @param Request $request
     * @param DocumentInterface $documentRepository
     */
    public function __construct(Request $request, DocumentInterface $documentRepository)
    {
        $this->request = $request;
        $this->documentRepository = $documentRepository;
    }
    
    public function deleteDocument()
    {
        if ($this->request->input('delete')) {
            $column = $this->request->input('column_name');
            if ($file = $this->documentRepository->findOneBy([['id', (int)$this->request->input('id')]])->$column) {
                unlink('../public/' . Storage::url($file));
            }
            $this->documentRepository->update('id', (int)$this->request->input('id'), [$column => null]);
        }
    }

    public function uploadData()
    {
        if ($this->request->input('add_discipline') != null) {
            $this->documentRepository->update('id', (int)$this->request->input('id'),
                [$this->request->input('column_name') => (int)$this->request->input('discipline')]);
        }

        if ($this->request->input('add_course') != null) {
            $this->documentRepository->update('id', (int)$this->request->input('id'),
                [$this->request->input('column_name') => (int)$this->request->input('course')]);
        }
    }

    public function uploadDocument()
    {
        if ($this->request->file('file')) {
            $filename = md5(time() . $this->request->file('file')) . '.' . $this->request->file('file')->guessExtension();
            $this->request->file('file')->move('storage/', $filename);

            $this->documentRepository->update('id', (int)$this->request->input('id'),
                [$this->request->input('column_name') => $filename]);
        }
    }
}