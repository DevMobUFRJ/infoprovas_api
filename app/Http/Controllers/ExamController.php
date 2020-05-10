<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    function getAll(Request $request, $course_id, $subject_id)
    {
        // Validate pair couse-subject
        $subject = Subject::whereId($subject_id)->where('course_id', $course_id)->get()->first();
        if (empty($subject)) {
            return $this->resource_error();
        }

        return response()->json($subject->exams);
    }

    function get(Request $request, $course_id, $subject_id, $exam_id)
    {
        // Validate pair couse-subject
        $subject = Subject::whereId($subject_id)->where('course_id', $course_id)->get()->first();
        if (empty($subject)) {
            return $this->resource_error();
        }

        // Validate exam for subject
        $exam = $subject->exams()->where('id', $exam_id)->get()->first();
        if (empty($exam)) {
            return $this->resource_error();
        }

        return response()->json($exam);
    }

    function getPDF(Request $request, $course_id, $subject_id, $exam_id)
    {
        // Validate pair couse-subject
        $subject = Subject::whereId($subject_id)->where('course_id', $course_id)->get()->first();
        if (empty($subject)) {
            return $this->resource_error();
        }

        // Validate exam for subject
        $exam = $subject->exams()->where('id', $exam_id)->get()->first();
        if (empty($exam)) {
            return $this->resource_error();
        }

        $file_path = $exam->file;
        //TODO Read file from folder and show to the user.
        return response()->json(["TODO" => "TODO: Implement PDF file response to show the file on ExamController@getPDF", "file" => $file_path]);
    }
}
