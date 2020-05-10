<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function getAll(Request $request){
        return response()->json(Course::all());
    }

    function get(Request $request, $course_id){
        $course = Course::find($course_id);
        if(empty($course)){
            return $this->resource_error();
        } else {
            return response()->json($course);
        }
    }
}
