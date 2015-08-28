<?php

namespace Lanoda\Http\Controllers\Contact;

use Auth;
use Lanoda\Contact;
use Lanoda\Image;
use Lanoda\Http\Controllers\Controller;

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
        $image = $imageEntry != null ? $imageEntry->get()->toArray() : null;

        return view('contact.detail', ['contact' => $contact, 'user' => $user, 'profile-image' => $image]);
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
        $image = $imageEntry != null ? $imageEntry->get()->toArray() : null;
        
        $contacts = Contact::where('user_id', $user['id'])->get();
        return view('contact.list', ['contacts' => $contacts, 'user' => $user, 'profile-image' => $image]);
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
        $contact = $request->all();
        $contact['user_id'] = Auth::user()->id;
        return Contact::create($contact);
    }

    /**
     * Update an existing contact
     *
     * @return Response
     */
    public function updateContact(Contact $contact, Request $request)
    {
        $new = $request->all();
        if(array_key_exists('image_id',   $new)) { $contact->image_id   = $new['image_id'];   };
        if(array_key_exists('firstname',  $new)) { $contact->firstname  = $new['firstname'];  };
        if(array_key_exists('middlename', $new)) { $contact->middlename = $new['middlename']; };
        if(array_key_exists('lastname',   $new)) { $contact->lastname   = $new['lastname'];   };
        if(array_key_exists('birthday',   $new)) { $contact->birthday   = $new['birthday'];   };
        $contact->save();
        return $contact->toArray();
    }
}
