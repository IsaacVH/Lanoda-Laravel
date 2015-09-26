<?php

namespace Lanoda\Http\Controllers\Note;

use Auth;
use Lanoda\Note;
use Lanoda\Image;
use Lanoda\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    /**
     * Show the contact detail page
     *
     * @param  Contact $contact
     * @return Response
     */
    public function showNotesForContact(Contact $contact) 
    {
    	$user = Auth::user();
    	if ($user->id == $contact->user_id) {
        	return view('notes.list', ['user' => $user, 'contact' => $contact]);
    	} else {
    		return "Error! You do not have access to these notes";
    	}
    }

    /**
     * Show the list of notes for the given contact.
     *
     * @param  Note $note
     * @return Response
     */
    public function showNoteDetail(Note $note)
    {
    	$user = Auth::user();
    	if ($user->id == $note->user_id) {
        	return view('notes.detail', ['user' => $user, 'contact' => $note]);
    	} else {
    		return "Error! You do not have access to that contact!";
    	}
    }

    /**
     * Render a partial view of a contact tile (for Ajax requests).
     *
     * @param  Request $request
     * @return Response
     */
    public function renderCreateNoteTile(Request $request) 
    {

        return view('contact.partials.note-tile', ['contact' => $this->createNote($request)]);
    }



    /**
     * Delete an existing contact for the current user
     *
     * @return Response
     */
    public function deleteNote(Note $note)
    {
    	return $note->delete();
    }

    /**
     * Create a new contact for the current user
     *
     * @return Response
     */
    public function createNote(Request $request, Contact $contact) 
    {
        $note = [
            'contact_id' => $contact->id,
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ];
        $result = Note::create($note);
        return $result;
    }

    /**
     * Get a contact's data
     *
     * @return Response
     */
    public function getNote(Note $note)
    {
        return $note;
    }

    /**
     * Update an existing contact
     *
     * @return Response
     */
    public function updateNote(Note $note, Request $request)
    {
        $new = $request->all();
        foreach($new as $key => $value) {
            if ($value != "") {
                $note->$key = $value;
            }
        }
        $note->save();
        return $note;
    }
}
