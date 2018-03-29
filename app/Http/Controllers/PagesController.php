<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        return view('pages.welcome');
    }

    public function getUser(){
        return view('user.create');
    }


    public function getLokacija(){
        return view('lokacija.create');
    }
}
