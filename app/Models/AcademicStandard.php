<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicStandard extends Model
{
    protected $fillable = [
        'name',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.academic_standards', parent::getTable());
    }
}
