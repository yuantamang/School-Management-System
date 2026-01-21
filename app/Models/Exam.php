<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'term'
    ];

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }
}
