<?php

namespace Lanoda\Http\Controllers\User;

use Auth;
use Lanoda\User;
use Lanoda\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile()
    {
        $user = Auth::user()->toArray();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Show the list of Users on the site.
     *
     * @return Response
     */
    public function listUsers()
    {
        $users = User::all()->get()->toArray();
        return view('user.list', ['users' => $users]);
    }
}


