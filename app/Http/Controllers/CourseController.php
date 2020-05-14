<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    function getAll(Request $request){
        return response()->json(Course::all());
    }

    /**
     * Get course information
     * @param Request $request
     * @param $course_id
     * @return JsonResponse
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
