<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'printable_name',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.subjects', parent::getTable());
    }
}
