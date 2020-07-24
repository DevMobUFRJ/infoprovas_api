<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\ErrorCodes;
use App\Professor;
use Exception;
use Illuminate\Http\Request;

/**
 * @group Professors
 * Professors details.
 *
 * Every exam has a Professor. The professor information (name and ID) is usually sent along with the exam on a
 * normal request, to avoid the need for multiple requests.
 */
class ProfessorController extends Controller
{
    /**
     * List Professors of a Course
     * @param Request $request
     * @param $course_id
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception INVALID_IDENTIFIER
     */
    function getAll(Request $request, $course_id)
    {
        $course = Course::whereId($course_id)->first();
        if (empty($course)) {
            throw new Exception("Curso não encontrado", ErrorCodes::INVALID_IDENTIFIER);
        }

        return response()->json($course->professors);
    }

    /**
     * Get professor details by Course
     * @param Request $request
     * @param $course_id
     * @param $professor_id
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception INVALID_IDENTIFIER
     */
    function get(Request $request, $course_id, $professor_id)
    {
        $professor = Professor::whereId($professor_id)->where('course_id', $course_id)->first();
        if (empty($professor)) {
            throw new Exception("Professor não encontrado", ErrorCodes::INVALID_IDENTIFIER);
        }

        return response()->json($professor);
    }
}
