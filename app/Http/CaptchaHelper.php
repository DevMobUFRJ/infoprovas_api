<?php

namespace App\Http;


use Exception;
use Illuminate\Support\Facades\Http;

class CaptchaHelper {

    /**
     * @throws Exception $code = INVALID_GOOGLE_CAPTCHA if the verification fails
     */
    public static function verify_token(String $g_captcha_response){
        $secret = env('CAPTCHA_SECRET', 'FILL IN YOUR CAPTCHA SECRET');
        $captcha_verify_url = "https://www.google.com/recaptcha/api/siteverify";

        $response = Http::post($captcha_verify_url, ['secret' => $secret, 'response' => $g_captcha_response]);

        if(empty($response->json()['success'])){
            throw new Exception("Captcha inválido", ErrorCodes::INVALID_GOOGLE_CAPTCHA);
        }

        return $response->json()['success'];
    }

}
