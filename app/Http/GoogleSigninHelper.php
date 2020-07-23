<?php
namespace App\Http;

use Exception;
use Google_Client;

class GoogleSigninHelper {

    /**
     * @param String $google_token
     * @param String $google_id The google_id
     * @return bool true if the token and id are valid, false if something can't be verified with google.
     * @throws Exception $code = ERROR_VERIFYING_GOOGLE_TOKEN, if there's an error with the validation request
     * @throws Exception $code = INVALID_GOOGLE_SIGNIN_TOKEN, if the token is invalid and rejected by google.
     */
    public static function verify_token(String $google_token, String $google_id){
        // Google id used on the front-end for authentication
        $CLIENT_ID = env('GOOGLE_AUTH_CLIENT_ID', 'FILL IN YOUR CLIENT ID');
        $client = new Google_Client(['client_id' => $CLIENT_ID]);

        try {
            $payload = $client->verifyIdToken($google_token);
        } catch (Exception $e) {
            throw new Exception("Erro ao verificar token de login", ErrorCodes::ERROR_VERIFYING_GOOGLE_TOKEN);
        }

        if ($payload) {
            $user_email = $payload['email'];
            return strcmp($user_email, $google_id) == 0;
        } else {
            throw new Exception("Token de login inválido", ErrorCodes::INVALID_GOOGLE_SIGNIN_TOKEN);
        }
    }
}
