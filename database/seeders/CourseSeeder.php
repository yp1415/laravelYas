<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courses;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courses::create([
            'image'           => 'courses/php.png',
            'title'           => 'دوره آموزش PHP',
            'about'           => 'یادگیری PHP از پایه تا پیشرفته برای بک‌اند.',
            'price'           => 500000,
            'time'            => '18:00 - 20:00',
            'days'            => 'شنبه و دوشنبه',
            'start_of_class'  => '2025-09-20',
            'is_active'       => true,
            'sessions_count'  => 12,
            'students_count'  => 30,
            'prerequisite'    => 'HTML, CSS',
        ]);

        Courses::create([
            'image'           => 'courses/laravel.png',
            'title'           => 'دوره تخصصی لاراول',
            'about'           => 'آموزش فریم‌ورک لاراول برای توسعه پروژه‌های واقعی.',
            'price'           => 800000,
            'time'            => '16:00 - 18:00',
            'days'            => 'یکشنبه و سه‌شنبه',
            'start_of_class'  => '2025-10-01',
            'is_active'       => true,
            'sessions_count'  => 15,
            'students_count'  => 25,
            'prerequisite'    => 'PHP مقدماتی',
        ]);
    }
}
