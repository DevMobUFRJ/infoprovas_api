<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\ErrorCodes;
use App\Subject;
use Exception;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     * @throws Exception INVALID_IDENTIFIER
     */
    function getAll(Request $request, $course_id){
        $course = Course::whereId($course_id)->first();
        if(empty($course) || $course->count() == 0){
            throw new Exception("Curso não encontrado", ErrorCodes::INVALID_IDENTIFIER);
        }

        return response()->json($course->subjects);
    }

    /**
     * Get subject details by course
     * @param Request $request
     * @param $course_id
     * @param $subject_id
     * @return JsonResponse
     * @throws Exception INVALID_IDENTIFIER
     */
    function get(Request $request, $course_id, $subject_id){
        $subject = Subject::whereId($subject_id)->where('course_id', $course_id)->get()->first();
        if(empty($subject)){
            throw new Exception("Matéria não encontrada", ErrorCodes::INVALID_IDENTIFIER);
        }

        return response()->json($subject);
    }
}
