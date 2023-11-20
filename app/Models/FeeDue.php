<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeDue extends Model
{
    protected $fillable = [
        'academic_year_id',
        'academic_standard_id',
        'term_id',
        'id_no',
        'total_amount',
        'paid_amount',
        'pending_amount',
        'is_penalty_applied',
        'penalty_amount',
        'next_due_date',
        'is_partial_payment'
    ];

    public function getTable()
    {
        return config('table.fee_dues', parent::getTable());
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
    public function academicStandard()
    {
        return $this->belongsTo(AcademicStandard::class, 'academic_standard_id');
    }
    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }
}
