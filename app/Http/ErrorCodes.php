<?php
namespace App\Http;

/**
 * Class ErrorCodes
 * @package App\Http
 * @group Error Codes
 */
class ErrorCodes
{
    const ERROR_VERIFYING_GOOGLE_TOKEN = 1;
    const INVALID_GOOGLE_SIGNIN_TOKEN = 2;
    const INVALID_GOOGLE_CAPTCHA = 3;

    const INVALID_IDENTIFIER = 10;
    const ERROR_SAVING_TO_DATABASE = 11;
    const ERROR_SAVING_TO_FILE_STORAGE = 12;
    const FILE_NOT_FOUND = 13;
    const ERROR_VALIDATING_FORM = 14;
}
