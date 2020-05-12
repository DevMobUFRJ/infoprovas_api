<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use Illuminate\Http\Request;

/**
 * @group Subjects
 * Subject details.
 *
 * Every exam belongs to a subject. The subject information (name, code, id etc) is usually sent along with
 * the exam on a normal request, to avoid the need for multiple requests.
 */
class SubjectController extends Controller
{
    /**
     * List subjects on a Course
     * @param Request $request
     * @param $course_id
     * @return \Illuminate\Http\JsonResponse
     */
    function getAll(Request $request, $course_id){
        $course = Course::find($course_id);
        if(empty($course) || $course->count() == 0){
            return $this->resource_error();
        }

        return response()->json($course->subjects);
    }

    /**
     * Get subject details by course
     * @param Request $request
     * @param $course_id
     * @param $subject_id
     * @return \Illuminate\Http\JsonResponse
     */
    function get(Request $request, $course_id, $subject_id){
        $subject = Subject::whereId($subject_id)->where('course_id', $course_id)->get()->first();
        if(empty($subject)){
            return $this->resource_error();
        }

        return response()->json($subject);
    }
}
