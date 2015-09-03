<?php

namespace Lanoda\Http\Controllers\Contact;

use Auth;
use Lanoda\Contact;
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
    public function showContact(Contact $contact) 
    {
        $user = Auth::user()->toArray();

        if($contact->user_id != $user['id']) {
            return redirect('/contacts')->with(['error' => 'You don\'t have access to that contact.']);
        }

        $imageEntry = Image::find($user['image_id']);
        $profileimage = $imageEntry != null ? $imageEntry->get()->toArray() : null;

        return view('contact.detail', compact($contact, $user, $profileimage));
    }

    /**
     * Show the list of contacts for the current user.
     *
     * @param  int $userId
     * @return Response
     */
    public function showContactsForCurrentUser()
    {
        $user = Auth::user()->toArray();

        $imageEntry = Image::find($user['image_id']);
        $profileimage = $imageEntry != null ? $imageEntry->get()->toArray() : null;
        
        $contacts = Contact::where('user_id', $user['id'])->get();
        return view('contact.list', ['contacts' => $contacts, 'user' => $user, 'profileimage' => $profileimage]);
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
        }
        return redirect('/contacts')->with(['error' => 'You don\'t have access to that contact.']);
    }

    /**
     * Create a new contact for the current user
     *
     * @return Response
     */
    public function createContact(Request $request) 
    {
        $contact = [
            'user_id' => Auth::user()->id,
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'address' => $request->input('address'),
            'birthday' => $request->input('birthday')
        ];
        $result = Contact::create($contact);
        return redirect('/contacts')->with(['create_result' => $result]);
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
}
