<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Resources\CoursesResourse;
use App\Models\Courses;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function getAllCourse() {
        $Cours = Courses::all();
        return response()->json([
            'message' => 'successfully',
            'courses' => CoursesResourse::collection($Cours),
        ], 200);
    }

    public function createNewCourse(CourseRequest $request) {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        $course = Courses::create($validated);
        return response()->json([
            'message' => 'Course created successfully!',
            'course' => new CoursesResourse($course)
        ], 201);
    }

    public function getCourseById($id)
    {
        $course = Courses::findOrFail($id);
        return response()->json([
            'message' => 'successfully',
            'course' => new CoursesResourse($course)
        ]);
    }
}
