<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Imports\StudentImport;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

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

        $students = Student::orderByDesc('id')->paginate(7);
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

    public function exportStudent()
    {
        $rows = [];

        Student::chunk(100, function ($students) use (&$rows) {
            foreach ($students->toArray() as $student) {
                $rows[] = $student;
            }
        });

        // Check if there are any rows before initiating the download
        if (!empty($rows)) {
            SimpleExcelWriter::streamDownload(downloadName: 'students.csv')
                ->addRows($rows);
        } else {
            // Handle the case where there are no students to export
            return response()->json(['message' => 'No students to export.']);
        }
    }

    public function importStudent(Request $request)
    {
        Excel::import(new StudentImport, request()->file('file'));
        return redirect()->route('student-index')->with('success', 'Imported Successfully!');
    }

}
