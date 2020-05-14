<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse Default error message with 404 HTTP code.
     */
    function resource_error(){
        //TODO Localization
        return $this->request_json_error_response('Resource missing');
    }

    /**
     * Returns a 404 error with the error message specified.
     * @param string $message
     */
    function request_json_error_response(string $message){
        return response()->json(['error' => $message], 404);
    }
}
