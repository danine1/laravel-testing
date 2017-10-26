<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * homepage for the movies
     */
    public function movies_homepage()
    {
        $view = view('movies/homepage'); //resources/views/ movies/homepage .blade.php
    
        // $user=auth()->user();

        // if($user->can('admin')) {
        //     // do some admin stuff
        //     dd('YOU ARE ADMIN, MY MASTER');
        // }

        // if($user->cant('admin')) {
        //     // sorry, you are not an administrator
        //     dd('KNEEL BEFORE ME, PEASANT!');
        // }



        $user = auth()->user();
        $user = \Auth::user(); //same as above
        // dd($user);

        return $view;
    }
}
