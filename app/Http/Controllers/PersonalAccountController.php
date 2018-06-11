<?php

namespace App\Http\Controllers;

use App\Repositories\CourseInterface;
use App\Repositories\DisciplineInterface;
use App\Repositories\DocumentInterface;
use App\Repositories\TeacherInterface;
use app\Services\DocumentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalAccountController extends Controller
{
    /**
     * @var DocumentInterface
     */
    private $documentRepository;
    /**
     * @var CourseInterface
     */
    private $courseRepository;
    /**
     * @var DisciplineInterface
     */
    private $disciplineRepository;
    /**
     * @var TeacherInterface
     */
    private $teacherRepository;
    /**
     * @var DocumentsService
     */
    private $documentsService;
    /**
     * @var Request
     */
    private $request;

    /**
     * PersonalAccountController constructor.
     * @param Request $request
     * @param DocumentInterface $documentRepository
     * @param CourseInterface $courseRepository
     * @param DisciplineInterface $disciplineRepository
     * @param TeacherInterface $teacherRepository
     * @param DocumentsService $documentsService
     */
    public function __construct(Request $request, DocumentInterface $documentRepository, CourseInterface $courseRepository,
                                DisciplineInterface $disciplineRepository, TeacherInterface $teacherRepository,
                                DocumentsService $documentsService)
    {
        $this->documentRepository = $documentRepository;
        $this->courseRepository = $courseRepository;
        $this->disciplineRepository = $disciplineRepository;
        $this->teacherRepository = $teacherRepository;
        $this->documentsService = $documentsService;
        $this->request = $request;
    }

    public function getAllDocuments($page)
    {
        $teacher = $this->teacherRepository->findOneBy([['id', $page]]);
        $disciplines = $this->disciplineRepository->findAllBy('teacher_id', $teacher->id);
        $course = $this->courseRepository->findAll();
        if ($disciplines->isEmpty()) {
            return 'Пожалуйста добавьте дисциплину';
        }

        if ($course->isEmpty()) {
            return 'Пожалуйста добавьте курсы';
        }

        if ($teacher) {
            $documents = $this->documentRepository->findAllByOrderBy('teacher_id', $teacher->id, 'id', 'desc');
            return view('document')->with(['documents' => $documents, 'courses' => $course, 'disciplines' => $disciplines, 'page' => $page]);
        }
        return redirect()->to('/login');
    }

    public function getAllTeachers()
    {
        $teachers = $this->teacherRepository->findAllOrderBy('full_name');
        return view('materials')->with(['teachers' => $teachers]);
    }

    public function createDocuments()
    {
        if ($this->request->input('create')) {
            $this->documentRepository->create(['discipline_id' => null, 'course_id' => null,
                'theoretical_materials' => null, 'practical_materials' => null, 'teacher_id' => Auth::user()->id]);
        }
        return redirect()->back();
    }

    public function deleteAllDocuments()
    {
        if ($this->request->input('deleteAll')) {
            $this->documentRepository->delete('id', (int)$this->request->input('id'));
        }
        return redirect()->back();
    }

    public function deleteDocument()
    {
        if ($this->request->input('delete')) {
            $column = $this->request->input('column_name');
            $this->documentRepository->update('id', (int)$this->request->input('id'), [$column => null]);
        }
        return redirect()->back();
    }

    public function uploadDocuments()
    {
        $this->validate($this->request, [
            'file' => 'max:20000',
        ]);

        try {
            $this->documentsService->uploadDocument();
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', 'Формат документа не поддерживается');
        }
    }

    public function uploadData()
    {
        $this->documentsService->uploadData();
        return redirect()->back();
    }

    public function deleteData()
    {
        if ($this->request->input('delete')) {
            $column = $this->request->input('column_name');
            $this->documentRepository->update('id', (int)$this->request->input('id'), [$column => null]);
        }
        return redirect()->back();
    }

    public function showAdminPanel()
    {
        $teachers = $this->teacherRepository->findAllOrderBy('full_name');
        $disciplines = $this->disciplineRepository->findAllOrderBy('title');
        return view('adminpanel')->with(['teachers' => $teachers, 'disciplines' => $disciplines]);
    }

    public function deleteTeacher()
    {
        if ($this->request->input('deleteTeacher')) {
            $this->disciplineRepository->delete('teacher_id', $this->request->input('teachers'));
            $this->documentRepository->delete('teacher_id', $this->request->input('teachers'));
            $this->teacherRepository->delete('id', $this->request->input('teachers'));
            return redirect()->back()->with('success', 'Пользователь был успешно удалён');
        }
        return redirect()->back();
    }

    public function deleteDiscipline()
    {
        if ($this->request->input('deleteDiscipline')) {
            $this->documentRepository->delete('discipline_id', $this->request->input('discipline'));
            $this->disciplineRepository->delete('id', $this->request->input('discipline'));
            return redirect()->back()->with('success', 'Дисциплина была успешно удалена');
        }
        return redirect()->back();
    }

    public function addDiscipline()
    {
        $this->validate($this->request, ['discipline' => 'required']);

        if ($this->request->input('addDiscipline')) {
            $this->disciplineRepository->create(['title' => $this->request->input('discipline'),
                'teacher_id' => $this->request->input('teachers')]);
            return redirect()->back()->with('success', 'Дисциплина была успешно добавлена');
        }
        return redirect()->back();
    }
}


