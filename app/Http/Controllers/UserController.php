<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        
        $users = DB::select('SELECT * FROM user_info');

        //compact function is shorter way of writing... return view('users/index')->with('users', $users);
        return  view('users/index', compact(['users']));
    }

    public function show($id)
    {
        $user = DB::select('SELECT * FROM user_info WHERE id = ?', [$id]);

        return $user[0];

        return $user->name;

        return $user;
    }
}
