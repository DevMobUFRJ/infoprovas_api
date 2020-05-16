<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
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
}
