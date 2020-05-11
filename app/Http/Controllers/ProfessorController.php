<?php

namespace App\Http\Controllers;

use App\Course;
use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    function getAll(Request $request, $course_id)
    {
        $course = Course::whereId($course_id)->first();
        if (empty($course)) {
            return $this->resource_error();
        }

        return response()->json($course->professors);
    }

    function get(Request $request, $course_id, $professor_id)
    {
        $professor = Professor::whereId($professor_id)->where('course_id', $course_id)->first();
        if (empty($professor)) {
            return $this->resource_error();
        }

        return response()->json($professor);
    }
}
