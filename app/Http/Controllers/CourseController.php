<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

/**
 * @group Courses
 * Course details and management
 */
class CourseController extends Controller
{
    /**
     * List all courses
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function getAll(Request $request){
        return response()->json(Course::all());
    }

    /**
     * Get course information
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function get(Request $request, $course_id){
        $course = Course::find($course_id);
        if(empty($course)){
            return $this->resource_error();
        } else {
            return response()->json($course);
        }
    }
}
