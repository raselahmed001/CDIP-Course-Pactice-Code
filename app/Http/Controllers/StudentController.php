<?php

namespace App\Http\Controllers;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $students = Student::latest('id');

        if ($request->get('keyword')) {
            $students = $students->where('name', 'like', '%' . $request->get('keyword') . '%');
        }

        $students = $students->get();

        return view('students', compact('students'));
    }

    public function export(Request $request)
    {
        return Excel::download(new StudentsExport($request), 'students.xlsx');
    }
}
