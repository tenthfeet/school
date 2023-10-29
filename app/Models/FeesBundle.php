<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FeesBundle extends Model
{
    protected $fillable = [
        'name',
        'academic_year_id',
        'academic_standard_id',
        'fee_detail_id',
        'total_amount',
        'due_date',
        'penalty_amount',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.fee_bundles', parent::getTable());
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function academicStandard(): BelongsTo
    {
        return $this->belongsTo(AcademicStandard::class, 'academic_standard_id');
    }

    public function feeDetails(): BelongsToMany
    {
        return $this->belongsToMany(
            FeeDetail::class,
            config('table.fee_bundles_and_fee_details'),
            'fee_bundle_id',
            'fee_detail_id'
        );
    }
}
