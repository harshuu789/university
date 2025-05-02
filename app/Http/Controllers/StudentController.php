<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with('teacher')
            ->when($request->search, function ($query, $search) {
                $query->where('student_name', 'like', "%$search%")
                      ->orWhere('class', 'like', "%$search%");
            })
            ->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    
}

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_name' => 'required|string',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete(); // soft delete
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
