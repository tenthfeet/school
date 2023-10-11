<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'exam_category_id',
        'medium_of_study_id',
        'date',
        'session',
        'subject',
        'class_name_id',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.exams', parent::getTable());
    }
    public function examCategory()
    {
        return $this->belongsTo(ExamCategory::class,'exam_category_id');
    }
    public function mediumofStudy()
    {
        return $this->belongsTo(MediumOfStudy::class,'medium_of_study_id');
    }
    public function className()
    {
        return $this->belongsTo(ClassName::class,'class_name_id');
    }
}
