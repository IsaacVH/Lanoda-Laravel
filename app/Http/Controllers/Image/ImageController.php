<?php

namespace Lanoda\Http\Controllers\Image;

use Auth;
use Lanoda\Image;
use Lanoda\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Get the image file
     * 
     * @param  Image  $image
     * @return Response
     */
    public function downloadImage(Image $image)
    {
        return response()->download($image->path);
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


