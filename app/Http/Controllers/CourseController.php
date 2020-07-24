<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\ErrorCodes;
use Exception;
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
     * @throws Exception INVALID_IDENTIFIER If the course id is not found.
     */
    function get(Request $request, $course_id){
        $course = Course::whereId($course_id)->first();
        if(empty($course)){
            throw new Exception("Curso não encontrado", ErrorCodes::INVALID_IDENTIFIER);
        } else {
            return response()->json($course);
        }
    }
}
