<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Returns a 404 error with a default message 'Resource missing'.
     * @return JsonResponse Response to forward to the user
     */
    function resource_error(){
        return $this->request_json_error_response('Resource missing');
    }

    /**
     * Returns a 404 error with the error message specified.
     * @param string $message
     * @return JsonResponse
     */
    function request_json_error_response(string $message){
        return response()->json(['error' => $message], 404);
    }

    function request_json_error_personalized(string $message, $http_code){
        return response()->json(['error' => $message], $http_code);
    }

    /**
     * Default exception handler for validation errors. Returns a json response to be sent to the user containing
     * all errors in the validation.
     * @param ValidationException $e
     * @return JsonResponse
     */
    function validation_error(ValidationException $e){
        $full_message = "";
        foreach($e->errors() as $error){
            $full_message = $full_message . $error[0] . ' ';
        }
        return $this->request_json_error_response($full_message);
    }
}
