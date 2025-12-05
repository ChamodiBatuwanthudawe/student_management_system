<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('subject')->orderBy('id', 'desc')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $subjects = Subject::orderBy('name')->get();
        return view('students.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Student::create($request->only('name', 'email', 'phone', 'subject_id'));

        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        $subjects = Subject::orderBy('name')->get();
        return view('students.edit', compact('student', 'subjects'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $student->update($request->only('name', 'email', 'phone', 'subject_id'));

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully.');
    }
}
