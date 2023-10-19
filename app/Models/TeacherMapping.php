<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherMapping extends Model
{
    protected $fillable = [
        'class_room_id',
        'academic_year_id',
        'user_id',
        'day',
        'class_period_id'
    ];

    public function getTable()
    {
        return config('table.mapping_teachers_classrooms_day_time',parent::getTable());
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
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
