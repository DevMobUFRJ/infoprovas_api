<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Professor;
use App\Subject;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;
use phpDocumentor\Reflection\Types\String_;

class ExamController extends Controller
{
    function getAllBySubject(Request $request, $course_id, $subject_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, $subject_id, null, null);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exams = Subject::find($subject_id)->exams()->with(['exam_type', 'professor', 'subject'])->get();
        return response()->json($exams);
    }

    function getBySubject(Request $request, $course_id, $subject_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, $subject_id, null, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = Exam::find($exam_id)->with(['exam_type', 'professor', 'subject'])->first();
        return response()->json($exam);
    }

    function getPDFBySubject(Request $request, $course_id, $subject_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, $subject_id, null, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = Exam::find($exam_id)->first();
        return $this->send_file_response($exam->file);
    }

    function getAllByProfessor(Request $request, $course_id, $professor_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, null, $professor_id, null);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exams = Professor::find($professor_id)->exams()->with(['exam_type', 'professor', 'subject'])->get();
        return response()->json($exams);
    }

    function getByProfessor(Request $request, $course_id, $professor_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, null, $professor_id, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = Exam::find($exam_id)->with(['exam_type', 'professor', 'subject'])->first();
        return response()->json($exam);
    }

    function getPDFByProfessor(Request $request, $course_id, $professor_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, null, $professor_id, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = Exam::find($exam_id)->first();
        return $this->send_file_response($exam->file);
    }

    /**
     * Default response with a PDF file to show the user.
     * @param String $file_path File path of the PDF file
     * @return \Illuminate\Http\JsonResponse
     */
    private function send_file_response($file_path){
        //TODO Read file from folder and show to the user.
        return response()->json(["TODO" => "TODO: Implement PDF file response to show the file on ExamController@getPDF", "file" => $file_path]);
    }

    /**
     * Checks if the input IDs are valid, verifying that each resource has a real relationship with the other.
     * (e.g. is the subject really in the course? and the exam really in that subject?)
     * @param int $course_id
     * @param int|null $subject_id
     * @param int|null $professor_id
     * @param int|null $exam_id
     * @return \Illuminate\Http\JsonResponse|null Returns null if the IDs are correct. Or a JSON response otherwise.
     */
    private function validate_input_ids($course_id, $subject_id, $professor_id, $exam_id){
        if(is_null($course_id)){
            return $this->resource_error();
        }

        if(!is_null($subject_id)){
            // Validate pair course-subject
            $subject = Subject::whereId($subject_id)->where('course_id', $course_id)->first();
            if (empty($subject)) {
                return $this->resource_error();
            }
        }

        if(!is_null($professor_id)){
            // Validate pair course-subject
            $professor = Professor::whereId($professor_id)->where('course_id', $course_id)->first();
            if (empty($professor)) {
                return $this->resource_error();
            }
        }

        if(!is_null($exam_id)){
            if(!empty($subject)){
                $exam = $subject->exams()->where('id', $exam_id)->first();
                if (empty($exam)) {
                    return $this->resource_error();
                }
            } else if (!empty($professor)){
                $exam = $professor->exams()->where('id', $exam_id)->first();
                if (empty($exam)) {
                    return $this->resource_error();
                }
            }
        }

        return null;
    }
}
