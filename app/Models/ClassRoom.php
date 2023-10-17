<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'academic_standard_id',
        'department_id',
        'section',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.class_rooms',parent::getTable());
    }

    public function academicStandard()
    {
        return $this->belongsTo(AcademicStandard::class,'academic_standard_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
