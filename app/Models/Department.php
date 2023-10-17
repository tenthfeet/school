<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.departments', parent::getTable());
    }
}
