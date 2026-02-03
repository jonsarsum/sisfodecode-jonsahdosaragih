<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $studyProgramCount = StudyProgram::count();
        $studentCount = Student::count();
        $subjectCount = Subject::count();

        return view('pages.home', compact('studyProgramCount', 'studentCount', 'subjectCount'));
    }
}
