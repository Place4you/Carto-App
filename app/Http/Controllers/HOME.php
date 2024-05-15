<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HOME extends Controller
{
    function homepage(){
        return view('homepage');

    }

    function contactpage(){
        return view('');
    }
}
