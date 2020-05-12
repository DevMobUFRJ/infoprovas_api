<?php

namespace App\Http\Controllers;

/**
 * @group Exams
 * Exams details and management.
 *
 * This is the main part of the API, allowing you to list exams, see exam details and the files.
 *
 * Every route comes filtered either by a subject or a professors, using composite full URLs. This is done to avoid
 * programming mistakes, requiring you to provide the course, exam, and subject or professor id in the same URL.
 */
use App\Exam;
use App\Professor;
use App\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * List exams by subject
     * @param Request $request
     * @param $course_id int
     * @param $subject_id int
     * @return JsonResponse
     */
    function getAllBySubject(Request $request, $course_id, $subject_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, $subject_id, null, null);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exams = Subject::find($subject_id)->exams()->with(['exam_type', 'professor', 'subject'])->get();
        return response()->json($exams);
    }

    /**
     * Get exam information by subject
     * @param Request $request
     * @param $course_id
     * @param $subject_id
     * @param $exam_id
     * @return JsonResponse
     */
    function getBySubject(Request $request, $course_id, $subject_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, $subject_id, null, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = Exam::find($exam_id)->with(['exam_type', 'professor', 'subject'])->first();
        return response()->json($exam);
    }

    /**
     * Get exam PDF file by subject.
     * @param Request $request
     * @param $course_id
     * @param $subject_id
     * @param $exam_id
     * @return JsonResponse PDF file if it exists. Error otherwise.
     */
    function getPDFBySubject(Request $request, $course_id, $subject_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, $subject_id, null, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = Exam::find($exam_id)->first();
        return $this->send_file_response($exam->file);
    }

    /**
     * List exams by professor
     * @param Request $request
     * @param $course_id
     * @param $professor_id
     * @return JsonResponse
     */
    function getAllByProfessor(Request $request, $course_id, $professor_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, null, $professor_id, null);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exams = Professor::find($professor_id)->exams()->with(['exam_type', 'professor', 'subject'])->get();
        return response()->json($exams);
    }

    /**
     * Get exam information by professor
     * @param Request $request
     * @param $course_id
     * @param $professor_id
     * @param $exam_id
     * @return JsonResponse
     */
    function getByProfessor(Request $request, $course_id, $professor_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, null, $professor_id, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = Exam::find($exam_id)->with(['exam_type', 'professor', 'subject'])->first();
        return response()->json($exam);
    }

    /**
     * Get exam PDF file by professor
     * @param Request $request
     * @param $course_id
     * @param $professor_id
     * @param $exam_id
     * @return JsonResponse PDF file if it exists. Error otherwise.
     */
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
     * @return JsonResponse Response to be returned to the user. Can be the file, or a JSON error.
     */
    private function send_file_response($file_path){
        //TODO Read file from folder and show to the user.
        return response()->json([
            "TODO" => "Implement PDF response ExamController@send_file_response",
            "file" => $file_path
        ]);
    }

    /**
     * Checks if the input IDs are valid, verifying that each resource has a real relationship with the other.
     * (e.g. is the subject really in the course? and the exam really in that subject?)
     * @param int $course_id
     * @param int|null $subject_id
     * @param int|null $professor_id
     * @param int|null $exam_id
     * @return JsonResponse|null Returns null if the IDs are correct. Or a JSON response otherwise.
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
