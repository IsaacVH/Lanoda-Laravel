<?php

namespace App\Http\Controllers\Account;

use App\User;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function login($id)
    {
        return view('account.profile', ['user' => User::findOrFail($id)]);
    }
}