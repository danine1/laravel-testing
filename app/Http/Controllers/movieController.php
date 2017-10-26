<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie; //from now on \App\Movie will be accessible just with the name Movie

class movieController extends Controller
{
     /**
     * list of movies
     */
    public function listing()
    {
        $view = view('movies/listing'); //resources/views/ movies/listing .blade.php

        $all_movies = Movie::orderBy('year', 'desc')->get();
        $view->movies = $all_movies;

        return $view;
    }


    public function search(Request $request) {

        $search = $request->search;

        // return Movie::get(); --get all movies

        //more specific - titles like the search criteria : 'LIKE' compares but doesnt require a perfect match
        return Movie::where('title', 'LIKE', '%'.$search.'%')->get(); 
    }

      /**
     * detail of movies
     */
    public function detail($id)
    {
        $view = view('movies/detail'); //resources/views/ movies/detail .blade.php

        $movie = Movie::find($id);
        // $movie = Movie::where('id', 1)->first(); //equivalent to above
        // $movie = Movie::findOrFail(1123);

        $view->movie = $movie;//put the movie into the view

        return $view;
    }



    /**
     * create a new movie
     */
    public function create()
    {
        $view = view('movies/edit');
        $view->movie = new Movie();

        return $view;

    }

        /**
     * edit a new movie
     */
    public function edit($id)
    {
    
        $movie = Movie::findOrFail($id);

        $view = view('movies/edit');
        $view->movie = $movie;

        return $view;

    }



       /**
     * create a new movie
     */
    public function store($id = null)
    {
        if($id) //if this is edit
        {
            //select movie from DB
            $movie= Movie::findOrFail($id);
        }
        else{
            // create empty object movie
            $movie = new Movie();
        }


        //fill it with selected data fro the request
        $movie->fill(request()->only([
            'title',
            'year',
            'plot'
        ]));
        $movie->title = $movie->title ?: '';
        $movie->plot = $movie->plot ?: '';
        $movie->year = $movie->year ?: '';

        //save the movie
        $movie->save();

        //inform the user of success
        session()->flash('success_message', 'The movie was successfully saved!');

        //redirect
        return redirect()->action('movieController@listing');
    }


     /**
     * Handle submission of the form
     */
    public function store_old($id = null)
    {
        // dd($request);

        $request = request();

        if($request->has('title'))
        {

            $title = $request->input('title');

        }

        $request->all();
        $request_data = $request->only([
            'title',
            'year',
            'plot'
        ]);
        $request_data = $request->except([
            '_token',
            'plot'
        ]);

        dd($request_data);
      
        //create a new object for the class movie
        $movie = new Movie();

        $movie->fill($request->all());

        $movie->fill($request->only([
            'title',
            'year',
            'plot'
        ]));

        //add some data from request into this object
        // $movie->title = $request->input('title');
        // $movie->year = $request->input('year');
        // $movie->plot = $request->input('plot');

        dd($movie);

        //save the movie
        // $movie->save();

        //redirect somewhere
    }






    /**
     * inserts a record in the movies table for testing purposes
     */
    public function test_insert()
    {
        //create an object of the model class
        $movie = new Movie();
        
        //modify its properties
        $movie->title = 'LEGO Batman';
        $movie->year = 2017;
        $movie->plot = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, labore non porro, aperiam ab minus in nisi natus, sequi tempora quidem totam voluptatibus fugit magni. Saepe deserunt consectetur explicabo incidunt.';


        //save the object
        // $movie->save();

        //happily inform the user
        return 'Movie was saved!';
    }



}
