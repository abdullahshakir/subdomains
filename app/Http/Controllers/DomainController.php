<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{

    public static function home()
    {
        return view('home');
    }
    
    public static function home1()
    {
        return view('home1');
    }

    public static function home2()
    {
        return view('home2');
    }

    public static function home3()
    {
        return view('home3');
    }

}
