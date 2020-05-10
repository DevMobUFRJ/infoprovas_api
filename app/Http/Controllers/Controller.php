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
        return response()->json(['error' => 'Resource missing'], 404);
    }
}
