<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    function getAll(Request $request, $course_id){
        $course = Course::find($course_id);
        if(empty($course) || $course->count() == 0){
            return $this->resource_error();
        }

        return response()->json($course->subjects);
    }

    function get(Request $request, $course_id, $subject_id){
        $subject = Subject::whereId($subject_id)->where('course_id', $course_id)->get()->first();
        if(empty($subject)){
            return $this->resource_error();
        }

        return response()->json($subject);
    }
}
