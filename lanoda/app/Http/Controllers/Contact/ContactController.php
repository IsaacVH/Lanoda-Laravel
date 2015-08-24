<?php

namespace App\Http\Controllers\Contact;

use DB;
use App\User;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Show the list of contacts for the current user.
     *
     * @param  int $userId
     * @return Response
     */
    public function listContactsForUser($userId)
    {
        $contacts = DB::select('SELECT * FROM user_contact WHERE user_id = $userId');
        return view('contact.list', ['contacts' => $contacts]);
    }
}
