<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'code',
        'study_program_id',
    ];

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }
}
