<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_no',
        'parent_info_id',
        'date_of_birth',
        'gender',
        'date_of_joining',
        'blood_group',
        'mother_tounge_id',
        'aadhar_no',
        'photo_path',
        'student_status_id',
        'password',
        'has_sibling',
        'sibling_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const PHOTOS_DIRECTORY = 'student_photos';

    public function getTable()
    {
        return config('table.students', parent::getTable());
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ParentInfo::class, 'parent_info_id');
    }

    public function sibling(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'sibling_id');
    }
}
