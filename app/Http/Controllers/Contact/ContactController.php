<?php

namespace Lanoda\Http\Controllers\Contact;

use Auth;
use Lanoda\Contact;
use Lanoda\Image;
use Lanoda\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Show the list of contacts for the current user.
     *
     * @param  int $userId
     * @return Response
     */
    public function listContacts()
    {
        $user = Auth::user()->toArray();

        $imageEntry = Image::Find($user['image_id']);
        $image = $imageEntry != null ? $imageEntry->get()->toArray() : null;
        
        $contacts = Contact::where('user_id', $user['id'])->get()->toArray();
        return view('contact.list', ['contacts' => $contacts, 'user' => $user, 'profile-image' => $image]);
    }

    /**
     * Show the contact detail page
     *
     * @param  int $contactId
     * @return Response
     */
    public function showContact($contactId) 
    {
        $user = Auth::user()->toArray();

        $imageEntry = Image::Find($user['image_id']);
        $image = $imageEntry != null ? $imageEntry->get()->toArray() : null;

        $contact = Contact::FindOrFail($contactId)->get()->toArray();
        return view('contact.detail', ['contact' => $contact, 'user' => $user, 'profile-image' => $image]);
    }

    /**
     * Create a new contact for the current user
     *
     * @return Response
     */
    public function createContact(Request $request) 
    {
        $contact = $request->input('contact');
        return Contact::create([
            'user_id' => Auth::user()->toArray()['id'],
            'firstname' => $contact['firstname'],
            'middlename' => $contact['middlename'],
            'lastname' => $contact['lastname'],
            'address' => $contact['address'],
            'birthday' => $contact['birthday']
        ]);
    }
}
