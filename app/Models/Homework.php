<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = [
        'class_room_id',
        'subject_id',
        'user_id',
        'date',
        'homework_detail',
        'is_active'
    ];

    public function getTable()
    {
        return config('table.homeworks',parent::getTable());
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
