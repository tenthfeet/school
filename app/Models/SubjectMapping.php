<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMapping extends Model
{
    protected $fillable = [
        'class_room_id',
        'academic_year_id',
        'subject_id',
        'day',
        'class_period_id'
    ];

    public function getTable()
    {
        return config('table.mapping_subjects_classrooms_day_time',parent::getTable());
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id');
    }
    public function classPeriod()
    {
        return $this->belongsTo(ClassPeriod::class,'class_period_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class,'academic_year_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
