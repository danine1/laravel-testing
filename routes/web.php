<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'HomeController@index')->name('route_homepage');

Route::get('/oceans/{name}', 'OceanController@show');

Route::get('/users', 'UserController@index');

Route::get('/users/{id}', 'UserController@show');

//when the user comes to the url /movies run the movies_homepage method of the indexController
Route::get('/movies', 'indexController@movies_homepage');

Route::get('/movies/list', 'movieController@listing');
Route::post('/movies/search', 'movieController@search');

Route::get('/movies/movie/{id}', 'movieController@detail')->name('movie detail');

Route::get('/movies/new', 'movieController@create')->middleware('auth');
Route::post('/movies/new', 'movieController@store')->middleware('auth');
Route::get('/movies/edit/{id}', 'movieController@edit')->middleware('auth');
Route::post('/movies/edit/{id}', 'movieController@store')->middleware('auth');

Route::get('roles/new', 'roleController@create');
Route::post('roles/new', 'roleController@store');
Route::get('roles/edit/{id}', 'roleController@edit');
Route::post('roles/edit/{id}', 'roleController@store');

// Route::get('/movies/movie/test_insert', 'movieController@test_insert');


// Route::get('/', 'HomeController@indexpage');

Route::get('/', function () {
    return view('welcome');//loads resources/views/index.blade.php, resources/views/index.php
})->name('homepage');


// // /ocean/anything
// Route::get('/oceans/{name}', function($name) {

    
//     return view('oceans/'.$name);

// })->where('name', '[a-zA-Z]+')// one or more letters
// ->name('ocean detail'); //this route will be known as 'ocean detail'


// Route::get('/oceans/pacific', function() {
    
//         return view('/oceans/pacific');
    
//     });







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
