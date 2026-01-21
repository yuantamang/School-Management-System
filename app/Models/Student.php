<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'school_id',
        'section_id',
        'registration_number',
        'dob',
        'caste',
        'gender',
        'admission_no',
        'address'
    ];
}
