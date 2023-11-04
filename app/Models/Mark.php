<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
        'student_admission_id',
        'academic_year_id',
        'exam_id',
        'subject_id',
        'class_room_id',
        'marks',
        'maximum_marks',
        'pass_marks',
        'grade_id',
    ];

    public function getTable()
    {
        return config('table.marks', parent::getTable());
    }

    public function studentAdmission()
    {
        return $this->belongsTo(Student::class, 'student_admission_id');
    }
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
