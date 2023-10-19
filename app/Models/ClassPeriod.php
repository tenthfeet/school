<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassPeriod extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.class_periods',parent::getTable());
    }

}
