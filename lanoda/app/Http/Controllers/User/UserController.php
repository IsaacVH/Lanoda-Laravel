<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        $attributes = array();
        if ($user != null) {
            $attributes = $user->toArray();
        }
        return view('user.profile', ['user' => $attributes]);
    }

    /**
     * Show the list of Users on the site.
     *
     * @return Response
     */
    public function listUsers()
    {
        $users = User::all()->toArray();
        return view('user.list', ['users' => $users]);
    }
}


