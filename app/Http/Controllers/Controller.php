<?php

namespace App\Http\Controllers;

use App\Http\ErrorCodes;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Default exception handler for validation errors. Throws an exception with the
     * ERROR_VALIDATING_FORM error code, and the validation errors as message.
     * @param ValidationException $e
     * @return string
     * @throws Exception ERROR_VALIDATING_FORM
     */
    function throw_validation_error(ValidationException $e){
        $full_message = "";
        foreach($e->errors() as $error){
            $full_message = $full_message . $error[0] . ' ';
        }
        throw new Exception($full_message, ErrorCodes::ERROR_VALIDATING_FORM);
    }
}
