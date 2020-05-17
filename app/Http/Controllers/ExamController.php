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
 * Each ID will then be verified to have a real relationship, instead of just considering the exam id alone.
 */

use App\Course;
use App\Exam;
use App\Professor;
use App\Subject;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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

        $exams = Subject::whereId($subject_id)->first()->exams()->with(['exam_type', 'professor', 'subject'])->get();
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

        $exam = Exam::whereId($exam_id)->with(['exam_type', 'professor', 'subject'])->first();
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

        $exam = Exam::whereId($exam_id)->first();
        return $this->send_file_response($exam->file);
    }

    /**
     * Report exam by subject.
     *
     * This route should be used to report fake/wrong exams, spam, or any inappropriate content.
     *
     * The body of this POST request doesn't need any information.
     * @param Request $request
     * @param $course_id
     * @param $professor_id
     * @param $exam_id
     * @return JsonResponse The updated exam. Error otherwise.
     */
    function reportBySubject(Request $request, $course_id, $subject_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, $subject_id, null, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = $this->increment_report($exam_id);

        return response()->json($exam);
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

        $exams = Professor::whereId($professor_id)->first()->exams()->with(['exam_type', 'professor', 'subject'])->get();
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

        $exam = Exam::whereId($exam_id)->with(['exam_type', 'professor', 'subject'])->first();
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

        $exam = Exam::whereId($exam_id)->first();
        return $this->send_file_response($exam->file);
    }

    /**
     * Report exam by professor.
     *
     * This route should be used to report fake/wrong exams, spam, or any inappropriate content.
     *
     * The body of this POST request doesn't need any information.
     * @param Request $request
     * @param $course_id
     * @param $professor_id
     * @param $exam_id
     * @return JsonResponse The updated exam. Error otherwise.
     */
    function reportByProfessor(Request $request, $course_id, $professor_id, $exam_id)
    {
        $ids_validation = $this->validate_input_ids($course_id, null, $professor_id, $exam_id);
        if(!is_null($ids_validation)){
            return $ids_validation;
        }

        $exam = $this->increment_report($exam_id);

        return response()->json($exam);
    }

    /**
     * @group Exams
     * Add Exam to a course
     *
     * Used to add new exams to the InfoProvas database.
     *
     * This action requires a Google Authentication. The sender application must implement a Google sign-in strategy,
     * which will give the sender application a token signed by google, and an identification of the user.
     * Both the token and the user ID are required and must be valid to be saved into the database.
     * The token will be checked with the ID to verify the user identity.
     * More info at https://developers.google.com/identity/sign-in/web/sign-in
     *
     * @bodyParam semester string required A semester string formatted like "2020.1" or "2008.2". Example: 2020.1
     * @bodyParam file file required The PDF file. File size limit: 8MB.
     * @bodyParam google_id string required The Google email for the user submitting the exam. Example: tony.stark@gmail.com
     * @bodyParam google_token string required The Google signed token to be verified for safety and checked against the google_id.
     * @bodyParam subject_id int required ID of the subject of the exam. Example: 1
     * @bodyParam professor_id int required ID of the professor of the exam. Example: 1
     * @bodyParam exam_type_id int required ID of the exam type. Example: 1
     * @response {
     *  "id": 4,
     *  "semester": "2020.1",
     *  "reports": 0,
     *  "subject_id": 1,
     *  "professor_id": 1,
     *  "exam_type_id": 1,
     *  "created_at": "2020-05-14T15:16:31",
     *  "updated_at": "2020-05-14T15:16:31",
     *  "deleted_at": null,
     *  "exam_type":{"id":1,"name":"Prova 1","order":1},
     *  "professor":{"id":1,"name":"Tony Stark","course_id":1},
     *  "subject":{"id":1,"code":"MAB123","name":"Sistemas de Informa\u00e7\u00e3o","semester":1,"course_id":1}
     * }
     * @response 404 {
     *  "error": "Resource missing"
     * }
     * @param Request $request
     * @param $course_id
     * @return JsonResponse
     */
    function addExam(Request $request, $course_id){
        try {
            $this->validate($request, [
                'semester' => 'required',
                'file' => 'required|mimes:pdf|max:8192',
                'google_id' => 'required',
                'google_token' => 'required',
                'subject_id' => 'required|integer|exists:subjects,id',
                'professor_id' => 'required|integer|exists:professors,id',
                'exam_type_id' => 'required|integer|exists:exam_types,id',
            ]);
        } catch (ValidationException $e){
            $full_message = "";
            foreach($e->errors() as $error){
                $full_message = $full_message . $error[0] . ' ';
            }
            return $this->request_json_error_response($full_message);
        }

        // Validate Course Id
        $course = Course::whereId($course_id);
        if(empty($course)){
            return $this->resource_error();
        }

        // Remove attributes that don't belong to an Exam
        $params = $request->except(['google_token', 'file']);

        // Create new Exam, then save it
        $exam = (new Exam())->create($params);
        $exam->update(['file' => Exam::generate_or_get_file_path($exam)]);
        $exam->save();

        $saved = $this->store_file($exam->file, $request->file('file'));

        if(!empty($saved_file)){
            Log::error("Unable to save file to storage for exam " . $exam->id);
            try{
                $exam->delete();
            } catch (Exception $e) {
                Log::error("Unable to delete exam after error saving file to storage. " . $exam->toJson());
            }
            return $this->request_json_error_response("Unable to save file to storage");
        }

        return response()->json($exam);
    }

    /**
     * Increment the reports on a given exam
     * @param $exam_id
     * @return Exam|Model|mixed|object|null Updated exam object
     */
    private function increment_report($exam_id){
        $exam = Exam::whereId($exam_id)->first();
        $exam->reports = $exam->reports + 1;
        $exam->save();
        return $exam;
    }

    /**
     * Default response with a PDF file to show the user.
     * @param String $file_path File path of the PDF file
     * @return \Illuminate\Http\Response
     */
    private function send_file_response(string $file_path){
        //TODO Keep an eye on this way of returning the file for download.
        //The 'app/' on the beggining is to fix the way it handles file stores and retrievals.
        $file = File::get(storage_path('app/' . $file_path));
        $response = response()->make($file, 200);
        $response = $response->header('Content-Type', 'application/pdf');
        return $response;
    }

    private function store_file($file_path, UploadedFile $exam_file){
        $file_name = preg_split("/\//", $file_path); // Match: /
        $file_name = $file_name[sizeof($file_name)-1];
        $file_path = str_replace('/' . $file_name, '', $file_path);

        return $exam_file->storeAs($file_path, $file_name) != false;
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
