<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeDetail extends Model
{
    protected $fillable = [
        'academic_year_id',
        'academic_standard_id',
        'fee_id',
        'fee_amount',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.fee_details', parent::getTable());
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class,'academic_year_id');
    }
    public function academicStandard()
    {
        return $this->belongsTo(AcademicStandard::class,'academic_standard_id');
    }
}
