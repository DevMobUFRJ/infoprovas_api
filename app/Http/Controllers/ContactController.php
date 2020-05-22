<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * @group Contacts
 * Submit a message to the server management team.
 *
 */
class ContactController extends Controller
{
    /**
     * @bodyParam name string required Name of the sender. Max length: 255.
     * @bodyParam email string required Email of the sender. Max length: 255.
     * @bodyParam subject string required Subject of the message. Max length: 255.
     * @bodyParam message string required The message for the team. Max length: 2000.
     * @response {
     *  "success": "Message submitted"
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function submitContact(Request $request){
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|max:2000',
            ]);
        } catch (ValidationException $e){
            return $this->validation_error($e);
        }

        $contact_params = $request->toArray();
        $contact = (new Contact())->create($contact_params);

        if(empty($contact)){
            return $this->request_json_error_response("Unable to save message to database");
        }

        return response()->json(['success' => 'Message submitted']);
    }
}
