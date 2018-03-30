<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        return view('pages.index');
    }

    public function getUser(){
        return view('user.create');
    }


    public function getLokacija(){
        return view('lokacija.create');
    }
    public function getPretplata(){
        return view('pretplate.create');
    }
}
