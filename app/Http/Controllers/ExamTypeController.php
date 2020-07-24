<?php

namespace App\Http\Controllers;

use App\ExamType;
use App\Http\ErrorCodes;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Exam Types
 *
 * The Exam Type is a class to differentiate exams, like Frist, Second, Third, or Final Exams.
 *
 * Every exam has a Type. The Exam Type information is usually sent along with the exam on a normal request, to
 * avoid the need for multiple requests.
 */
class ExamTypeController extends Controller
{
    /**
     * List Exam Types
     * @param Request $request
     * @return JsonResponse
     */
    function getAll(Request $request)
    {
        return response()->json(ExamType::all());
    }

    /**
     * Get Exam Type information
     * @param Request $request
     * @param $exam_type_id
     * @return JsonResponse
     * @throws Exception INVALID_IDENTIFIER
     */
    function get(Request $request, $exam_type_id)
    {
        $exam_type = ExamType::whereId($exam_type_id)->get()->first();
        if (empty($exam_type)) {
            throw new Exception("ID de tipo de prova inválido", ErrorCodes::INVALID_IDENTIFIER);
        }

        return response()->json($exam_type);
    }
}
