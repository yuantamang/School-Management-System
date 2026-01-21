<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "user_id",
        "school_id",
        "registration_number",
        "job",
        "qualification",
        "date_of_joining",
        "phone",
        "address"
    ];
}
