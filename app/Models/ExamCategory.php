<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model
{

    protected $fillable = [
        'name',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.exam_categories', parent::getTable());
    }
}
