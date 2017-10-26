<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovieRole;

class roleController extends Controller
{
    protected $genres = [
        1 => 'Action',
        2 => 'Comedy',
        3 => 'Drama',
        4 => 'Thriller',
    ];


    public function create()
    {
        $view = view('roles/edit');
        $view->role = new MovieRole();
        $view->movies = \App\Movie::all();
        $view->genres = $this->genres;
        
        return $view;
    }

    public function edit($id=null)
    {
        $role = MovieRole::findOrFail($id);
        
        $view = view('roles/edit');
        $view->role = $role;
        $view->movies = \App\Movie::all();
        $view->genres = $this->genres;
        
        return $view;
    }

    public function store($id=null)
    {
        if($id)
        {
            $role = MovieRole::findOrFail($id);//from the DB
        }
        else
        {
            $role = new MovieRole();//or a new movie
        }
        
        //fill in data
        $role->fill(request()->only([
            'movie_id',
            'name',
            'genre_id'
        ]));
        
        $role->save();
        
        //saved in the session for only one request - then deleted
        session()->flash('success_message', 'The role was successfully saved');
        
        return redirect()->action('roleController@edit', ['id' => $role->id]);
    }

}
