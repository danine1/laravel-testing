<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OceanController extends Controller
{
    public function show($name){
        
        return  view ('oceans/' . $name, compact(['name']));
    }
}
