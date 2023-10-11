<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'medium_of_study',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.class_names',parent::getTable());
    }

    public function mediumofStudy()
    {
        return $this->belongsTo(MediumOfStudy::class,'medium_of_study');
    }
}
