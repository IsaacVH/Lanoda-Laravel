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
    public function showUser()
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

    /**
     * Show the environment variables.
     * 
     * @return Response
     */
    public function configSettings() 
    {
        $user = Auth::user()->toArray();
        if($user["is_admin"]) {
            return view('admin.settings');
        }

        return redirect('/auth/login')->with('error', 'You do not have permission to access that.');
    }

    public function databaseSettings()
    {
        $user = Auth::user()->toArray();
        if($user["is_admin"]) {
            return parse_url(getenv("DATABASE_URL"));
        }

        return redirect('/auth/login')->with('error', 'You do not have permission to access that.');
    }
}


