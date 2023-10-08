<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     protected $fillable = [
        'name',
        'code',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.states', parent::getTable());
    }
}
