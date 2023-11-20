<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'id_no',
        'date',
        'fore_noon',
        'after_noon',
    ];

    public function getTable()
    {
        return config('table.attendances', parent::getTable());
    }
}
