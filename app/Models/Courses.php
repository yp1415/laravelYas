<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'title',
        'price',
        'time',
        'days',
        'start_of_class',
        'is_active',
        'sessions_count',
        'students_count',
        'prerequisite'
    ];
}
