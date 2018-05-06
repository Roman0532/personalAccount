<?php

namespace App\Http\Controllers;

use App\Repositories\CourseInterface;
use App\Repositories\DisciplineInterface;
use App\Repositories\DocumentInterface;
use App\Repositories\TeacherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function getAllDocuments($page, DocumentInterface $documentRepository, CourseInterface $courseRepository, DisciplineInterface $disciplineRepository, TeacherInterface $teacherRepository)
    {
        $teacher = $teacherRepository->findOneBy([['email', $page]]);
        $disciplines = $disciplineRepository->findAll();
        $course = $courseRepository->findAll();
        if ($disciplines->isEmpty()) {
            return 'Пожалуйста добавьте дисциплину';
        }

        if ($course->isEmpty()) {
            return 'Пожалуйста добавьте курсы';
        }

        if ($teacher) {
            $documents = $documentRepository->findAllByOrderBy('teacher_id', $teacher->id,'id','desc');
            return view('document')->with(['documents' => $documents, 'courses' => $course, 'disciplines' => $disciplines, 'page' => $page]);
        }
        return redirect()->to('/login');
    }

    public function getAllTeachers(TeacherInterface $teacherRepository)
    {
        $teachers = $teacherRepository->findAll();
        return view('materials')->with(['teachers' => $teachers]);
    }

    public function createDocuments(Request $request, DocumentInterface $documentRepository)
    {
        if ($request->input('create')) {
            $documentRepository->create(['discipline_id' => null, 'course_id' => null, 'theoretical_materials' => null, 'practical_materials' => null, 'teacher_id' => Auth::user()->id]);
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
            $documentRepository->update('id', (int)$request->input('id'), [$request->input('column_name') => null]);
        }
        return redirect()->back();
    }

    public function uploadDocuments(Request $request, DocumentInterface $documentRepository)
    {
        $this->validate($request, [
            'file' => 'max:20000',
        ]);

        if ($request->input('add_discipline') != null) {
            $documentRepository->update('id', (int)$request->input('id'), [$request->input('column_name') => (int)$request->input('discipline') + 1]);
        }

        if ($request->input('add_course') != null) {
            $documentRepository->update('id', (int)$request->input('id'), [$request->input('column_name') => (int)$request->input('course') + 1]);
        }

        if ($request->file('file')) {
            $filename = md5(time() . $request->file('file')) . '.' . $request->file('file')->guessExtension();
            $request->file('file')->move('storage/', $filename);

            $documentRepository->update('id', (int)$request->input('id'), [$request->input('column_name') => Storage::url($filename)]);
        }
        return redirect()->back();
    }
}


