<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursesStudents extends Model
{
       protected $fillable = [
        'class_id',
        'student_id'
    ];
}
