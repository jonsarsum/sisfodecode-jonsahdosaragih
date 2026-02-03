<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('studyProgram')->get();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('subjects.create', compact('studyPrograms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:subjects,code',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        Subject::create($validated);

        return redirect()->route('subjects.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subject->load('studyProgram');
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $studyPrograms = StudyProgram::all();
        return view('subjects.edit', compact('subject', 'studyPrograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:subjects,code,' . $subject->id,
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        $subject->update($validated);

        return redirect()->route('subjects.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
