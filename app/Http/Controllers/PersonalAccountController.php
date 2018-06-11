<?php

namespace App\Http\Controllers;

use App\Repositories\CourseInterface;
use App\Repositories\DisciplineInterface;
use App\Repositories\DocumentInterface;
use App\Repositories\TeacherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PersonalAccountController extends Controller
{
    public function getAllDocuments($page, DocumentInterface $documentRepository, CourseInterface $courseRepository, DisciplineInterface $disciplineRepository, TeacherInterface $teacherRepository)
    {
        $teacher = $teacherRepository->findOneBy([['id', $page]]);
        $disciplines = $disciplineRepository->findAllBy('teacher_id', $teacher->id);
        $course = $courseRepository->findAll();
        if ($disciplines->isEmpty()) {
            return 'Пожалуйста добавьте дисциплину';
        }

        if ($course->isEmpty()) {
            return 'Пожалуйста добавьте курсы';
        }

        if ($teacher) {
            $documents = $documentRepository->findAllByOrderBy('teacher_id', $teacher->id, 'id', 'desc');
            return view('document')->with(['documents' => $documents, 'courses' => $course, 'disciplines' => $disciplines, 'page' => $page]);
        }
        return redirect()->to('/login');
    }

    public function getAllTeachers(TeacherInterface $teacherRepository)
    {
        $teachers = $teacherRepository->findAllOrderBy('full_name');
        return view('materials')->with(['teachers' => $teachers]);
    }

    public function createDocuments(Request $request, DocumentInterface $documentRepository)
    {
        if ($request->input('create')) {
            $documentRepository->create(['discipline_id' => null, 'course_id' => null,
                'theoretical_materials' => null, 'practical_materials' => null, 'teacher_id' => Auth::user()->id]);
        }
        return redirect()->back();
    }

    public function deleteAllDocuments(Request $request, DocumentInterface $documentRepository)
    {
        if ($request->input('deleteAll')) {
            $documentRepository->delete('id', (int)$request->input('id'));
        }
        return redirect()->back();
    }

    public function deleteDocument(Request $request, DocumentInterface $documentRepository)
    {
        if ($request->input('delete')) {
            $column = $request->input('column_name');
            if ($file = $documentRepository->findOneBy([['id', (int)$request->input('id')]])->$column) {
                unlink('../public/' . $file);
            }
            $documentRepository->update('id', (int)$request->input('id'), [$column => null]);
        }
        return redirect()->back();
    }

    public function uploadDocuments(Request $request, DocumentInterface $documentRepository)
    {
        $this->validate($request, [
            'file' => 'max:20000',
        ]);

        try {
            if ($request->input('add_discipline') != null) {
                $documentRepository->update('id', (int)$request->input('id'),
                    [$request->input('column_name') => (int)$request->input('discipline')]);
            }

            if ($request->input('add_course') != null) {
                $documentRepository->update('id', (int)$request->input('id'),
                    [$request->input('column_name') => (int)$request->input('course')]);
            }

            if ($request->file('file')) {
                $filename = md5(time() . $request->file('file')) . '.' . $request->file('file')->guessExtension();
                $request->file('file')->move('storage/', $filename);

                $documentRepository->update('id', (int)$request->input('id'),
                    [$request->input('column_name') => Storage::url($filename)]);
            }
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', 'Формат документа не поддерживается');
        }
    }

    public function showAdminPanel(TeacherInterface $teacherRepository, DisciplineInterface $disciplineRepository)
    {
        $teachers = $teacherRepository->findAllOrderBy('full_name');
        $disciplines = $disciplineRepository->findAllOrderBy('title');
        return view('adminpanel')->with(['teachers' => $teachers, 'disciplines' => $disciplines]);
    }

    public function deleteTeacher(Request $request, TeacherInterface $teacherRepository,
                                  DisciplineInterface $disciplineRepository, DocumentInterface $documentRepository)
    {
        if ($request->input('deleteTeacher')) {
            $disciplineRepository->delete('teacher_id', $request->input('teachers'));
            $documentRepository->delete('teacher_id', $request->input('teachers'));
            $teacherRepository->delete('id', $request->input('teachers'));
            return redirect()->back()->with('success', 'Пользователь был успешно удалён');
        }
        return redirect()->back();
    }

    public function deleteDiscipline(Request $request, DisciplineInterface $disciplineRepository, DocumentInterface $documentRepository)
    {
        if ($request->input('deleteDiscipline')) {
            $documentRepository->delete('discipline_id', $request->input('discipline'));
            $disciplineRepository->delete('id', $request->input('discipline'));
            return redirect()->back()->with('success', 'Дисциплина была успешно удалена');
        }
        return redirect()->back();
    }

    public function addDiscipline(Request $request, DisciplineInterface $disciplineRepository)
    {
        if ($request->input('addDiscipline')) {
            $this->validate($request, ['discipline' => 'required']);
            $disciplineRepository->create(['title' => $request->input('discipline'),
                'teacher_id' => $request->input('teachers')]);
            return redirect()->back()->with('success', 'Дисциплина была успешно добавлена');
        }
        return redirect()->back();
    }
}


