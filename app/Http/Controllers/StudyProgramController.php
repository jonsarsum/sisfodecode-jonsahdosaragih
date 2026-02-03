<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyPrograms = StudyProgram::all();
        return view('study-programs.index', compact('studyPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('study-programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:study_programs,code',
        ]);

        StudyProgram::create($validated);

        return redirect()->route('study-programs.index')
            ->with('success', 'Program studi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyProgram $studyProgram)
    {
        return view('study-programs.show', compact('studyProgram'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyProgram $studyProgram)
    {
        return view('study-programs.edit', compact('studyProgram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyProgram $studyProgram)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:study_programs,code,' . $studyProgram->id,
        ]);

        $studyProgram->update($validated);

        return redirect()->route('study-programs.index')
            ->with('success', 'Program studi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyProgram $studyProgram)
    {
        $studyProgram->delete();

        return redirect()->route('study-programs.index')
            ->with('success', 'Program studi berhasil dihapus.');
    }
}
