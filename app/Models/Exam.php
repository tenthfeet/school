<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name',
        'exam_category_id',
        'medium_of_study_id',
        'date',
        'session',
        'subject_id',
        'class_room_id',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.exams', parent::getTable());
    }
    public function examCategory()
    {
        return $this->belongsTo(ExamCategory::class, 'exam_category_id');
    }
    public function mediumofStudy()
    {
        return $this->belongsTo(MediumOfStudy::class, 'medium_of_study_id');
    }
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
