<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function submitStudentInCourse(Request $request, $id)
    {
        $student = $request->user();
        $course = Courses::find($id);

        if (!$course) {
            return response()->json([
                "message" => "Course not found"
            ], 404);
        }

        $student->courses()->syncWithoutDetaching([$course->id]);

        return response()->json([
            "message" => "Student registered successfully 🚀",
            "course" => $course->load("students")
        ]);
    }

}
