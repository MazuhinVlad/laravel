<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')
            ->take(10)
            ->get();

        return view('students.index', compact('students'));
    }

    public function store(StoreStudentRequest $request, StudentService $service)
    {
        $service->createStudent($request->validated()['name']);

        return redirect('/students')
            ->with('success', 'Студента додано!');
    }
}
