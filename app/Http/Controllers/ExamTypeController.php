<?php

namespace App\Http\Controllers;

use App\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    function getAll(Request $request)
    {
        return response()->json(ExamType::all());
    }

    function get(Request $request, $exam_type_id)
    {
        $exam_type = ExamType::whereId($exam_type_id)->get()->first();
        if (empty($exam_type)) {
            return $this->resource_error();
        }

        return response()->json($exam_type);
    }
}
