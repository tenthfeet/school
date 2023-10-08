<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'name',
        'fee_type',
        'fee_amount',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.fees', parent::getTable());
    }
}
