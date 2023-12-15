<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    public function index(Request $request)
    {   
        if($request->ajax()){
            $keyword = "%{$request->search}%";
            $students = Student::where('name', 'like', $keyword)->paginate(7);
            $student_count = count(Student::all());
            $html = View::make('student.search', compact('students'))->render();

            return response()->json([
                'success' => true,
                'html' => $html,
                'student_count' => $student_count,
            ]);
        }
        
        $students = Student::paginate(7);
        $student_count = count(Student::all());
        return view('student.index', compact('students', 'student_count'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());
        return redirect()->route('student-index')->with('success', 'Student created successfully');
    }

    public function destory(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'The record has been deleted successfully.',
            'status' => 200,
        ], 200);
    }
}
