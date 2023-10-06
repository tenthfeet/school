<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesType extends Model
{
    protected $fillable = [
        'name',
        'fees_type',
        'fees_amount',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.fees_types', parent::getTable());
    }
}
