<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_name', 
        'mother_name', 
        'father_occupation', 
        'mother_occupation', 
        'email', 
        'mobile_no',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'pincode',
        
    ];

    public function getTable()
    {
        return config('table.parents_info', parent::getTable());
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'parent_info_id');
    }
}
