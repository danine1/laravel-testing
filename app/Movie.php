<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //

    // protected $fillable = [
    //     'title',
    //     'year',
    //     'plot'
    // ];


    protected $guarded = [
        'id'
    ];
  

    //defining the relationship between movie and movie roles
    public function movie_roles()
    {
        return $this->hasMany('App\MovieRole');
    }
}
