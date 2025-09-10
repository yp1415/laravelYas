<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'image',
        'title',
        'about',
        'price',
        'time',
        'days',
        'start_of_class',
        'is_active',
        'sessions_count',
        'students_count',
        'prerequisite'
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id')
                    ->withTimestamps();
    }
}
