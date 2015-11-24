<?php

namespace Lanoda\Http\Controllers\Contact;

use Auth;
use Lanoda\NoteType;
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
        $user = Auth::user();
        $contact = Contact::where('url_name', $contact_name)->first();
        if ($contact == null) {
            return redirect('/contacts');
        } else if ($contact->user_id != $user->id) {
            return redirect('/contacts')->with('error', 'You do not have access to that contact.');
        }

        $contactTypes = ContactType::all();
        $noteTypes = NoteType::all();
        return view('contact.detail', compact('contact', 'contactTypes', 'noteTypes'));
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

        $response = ['errors' => [], 'messages' => []];
        $image = null;;

        if ($request->hasFile('image')) {
            // Save the image to the filesystem and DB
            $imageResult = $this->saveImage($request->file('image'), Auth::user()->id);
            array_merge($response['errors'], $imageResult['errors']);
            $image = $imageResult['image'];
        }


        $name = [
            'f' => $request->input('firstname'),
            'm' => $request->input('middlename'),
            'l' => $request->input('lastname')
        ];
        $contact = [
            'user_id' => Auth::user()->id,
            'image_id' => $image != null ? $image->id : null,
            'url_name' => $this->buildUrlName($name['f'], $name['m'], $name['l']),
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'age' => $request->input('age'),
            'birthday' => $request->input('birthday')
        ];

        $result = Contact::create($contact);


        if($request->input('relations') != null) {
            for ($i = 0; $i < sizeof($request->input('relations')); $i++) {
                //$response .= "<br/>" . $request->input('relations')[$i];
            }
        }

        return $response;
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
     * Get all contacts
     *
     * @return Response
     */
    public function getContacts()
    {
        $contacts = Contact::all();
        return $contacts;
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
    private function buildUrlName($firstname, $middlename, $lastname) 
    {

        $invalid_characters = array("$", "%", "#", "<", ">", "|", "/", "\\", " ");

        $fname = $firstname != null ? urlencode(strtolower(str_replace($invalid_characters, "", $firstname))) : "";
        $mname = $middlename != null ? urlencode(strtolower(str_replace($invalid_characters, "", $middlename))) : "";
        $lname = $lastname != null ? urlencode(strtolower(str_replace($invalid_characters, "", $lastname))) : "";

        $minit = sizeof($middlename) > 0 ? $mname[0] . "-" : "";

        $urlName = $fname . "-" . $minit . $lname;

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

    /**
     * Safely store an image and store location in image table
     * 
     * @return string[] Result
     */
    private function saveImage($file, $userId) 
    {
        $result = ['image' => null, 'errors' => []];
        if ($file->isValid()) {
            if ($file->getClientSize() < $file->getMaxFilesize()) {

                // File exists and isValid, now move to directory.
                $directory = sprintf('/data/users/%s/images', $userId);
                $image = [
                    'name' => $file->getClientOriginalName(),
                    'url' => $directory. '/' . camel_case($file->getClientOriginalName()),
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getClientSize()
                ];
                $file->move(public_path() . $directory, camel_case($file->getClientOriginalName()));
                $result['image'] = Image::create($image);

            } else {
                array_push($result['errors'], 'Image Error: File is too large');
            }
        } else {
            array_push($result['errors'], 'Image Error: File is not valid');
        }

        return $result;
    }
}
