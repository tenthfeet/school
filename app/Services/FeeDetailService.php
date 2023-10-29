<?php

namespace App\Services;

use App\Models\FeeDetail;

class FeeDetailService
{
    function feeDetailsByYearAndStandard(int $academicYearId, int $academicStandardId): array
    {
        $feeDetails = FeeDetail::with('fee')
            ->where('academic_year_id', $academicYearId)
            ->where('academic_standard_id', $academicStandardId)
            ->get();

        $data = [];
        foreach ($feeDetails as $feeDetail) {
            $data[] = ['id' => $feeDetail->id, 'text' => $feeDetail->fee->name];
        }

        return $data;
    }
}
