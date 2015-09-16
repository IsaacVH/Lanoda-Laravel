<?php

namespace Lanoda\Http\Controllers\Contact;

use Auth;
use Lanoda\Contact;
use Lanoda\ContactType;
use Lanoda\Image;
use Lanoda\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Show the contact detail page
     *
     * @param  int $contactId
     * @return Response
     */
    public function showContactDetail($contact_name) 
    {
        return view('contact.detail', ['contact' => Contact::where('url_name', $contact_name)->first(), 'contactTypes' => ContactType::all()]);
    }

    /**
     * Show the list of contacts for the current user.
     *
     * @param  int $userId
     * @return Response
     */
    public function showContactsForCurrentUser()
    {
        return view('contact.list', ['user' => Auth::user()]);
    }

    /**
     * Render a partial view of a contact tile (for Ajax requests).
     *
     * @param  Request $request
     * @return Response
     */
    public function renderCreateContact(Request $request) 
    {
        return view('contact.partials.contact-tile', ['contact' => $this->createContact($request)]);
    }



    /**
     * Delete an existing contact for the current user
     *
     * @return Response
     */
    public function deleteContact(Contact $contact)
    {
        if($contact['user_id'] == Auth::user()->id) {
            return $contact->delete();
        } else {
            return ["error" => "Unauthorized"];
        }
    }

    /**
     * Create a new contact for the current user
     *
     * @return Response
     */
    public function createContact(Request $request) 
    {
        $middleinitial = $request->has('middlename') && sizeof($request->input('middlename')) > 0 ? $request->input('middlename')[0] : "";
        $contact = [
            'user_id' => Auth::user()->id,
            'url_name' => $this->buildUrlName($request->input('firstname'), $request->input('middlename'), $request->input('lastname')),
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'birthday' => $request->input('birthday')
        ];
        $result = Contact::create($contact);
        return $result;
    }

    /**
     * Get a contact's data
     *
     * @return Response
     */
    public function getContact(Contact $contact)
    {
        return $contact;
    }

    /**
     * Update an existing contact
     *
     * @return Response
     */
    public function updateContact(Contact $contact, Request $request)
    {
        $new = $request->all();
        foreach($new as $key => $value) {
            if ($value != "") {
                $contact->$key = $value;
            }
        }
        $contact->save();
        return $contact;
    }


    /**
     * Build url-friendly unique identifier
     *
     * @return Response
     */
    private function buildUrlName($firstname, $middlename, $lastname) {
        $firstname = $firstname != null ? $firstname : "";
        $middleInitial = $middlename != null && sizeof($middlename) > 0 ? $middlename[0] . "-" : "";
        $lastname = $lastname != null ? $lastname : "";
        $urlName = strtolower($firstname) . "-" . strtolower($middleInitial) . strtolower($lastname);

        if (sizeof(Contact::where('url_name', $urlName)->get()) > 0) {
            $urlName .= "-1";

            $counter = 2;
            while(sizeof(Contact::where('url_name', $urlName)->get()) > 0) {
                $urlName[sizeof($urlName) - 1] = $counter;
                $counter++;
            }
        }

        return $urlName;
    }
}
