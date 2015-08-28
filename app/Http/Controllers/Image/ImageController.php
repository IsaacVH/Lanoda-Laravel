<?php

namespace Lanoda\Http\Controllers\Image;

use Auth;
use Lanoda\Image;
use Lanoda\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showImage()
    {
        $user = Auth::user()->toArray();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Show the list of Users on the site.
     *
     * @return Response
     */
    public function listImage()
    {
        $users = User::all()->get()->toArray();
        return view('user.list', ['users' => $users]);
    }
}


