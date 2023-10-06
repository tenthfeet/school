<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     protected $fillable = [
        'name',
        'iso_code',
        'mobile_code',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.countries', parent::getTable());
    }
}
