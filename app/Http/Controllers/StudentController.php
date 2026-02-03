<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('studyProgram')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('students.create', compact('studyPrograms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:students,nim',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('studyProgram');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $studyPrograms = StudyProgram::all();
        return view('students.edit', compact('student', 'studyPrograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:students,nim,' . $student->id,
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
