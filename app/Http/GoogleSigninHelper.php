<?php
namespace App\Http;

use Google_Client;

class GoogleSigninHelper {

    /**
     * @param String $google_token
     * @param String $google_id The google_id
     * @return bool true if the token and id are valid, false if something can't be verified with google.
     */
    public static function verify_token(String $google_token, String $google_id){
        // Google id used on the front-end for authentication
        $CLIENT_ID = env('GOOGLE_AUTH_CLIENT_ID', 'FILL IN YOUR CLIENT ID');
        $client = new Google_Client(['client_id' => $CLIENT_ID]);

        try {
            $payload = $client->verifyIdToken($google_token);
            if ($payload) {
                // If request specified a G Suite domain:
                //$domain = $payload['hd'];
                $user_email = $payload['email'];
                return strcmp($user_email, $google_id) == 0;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

}
