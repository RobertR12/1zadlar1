<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\lokacija;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //$lokacija =lokacija::pluck('Title', 'Country');

        $lokacija = lokacija::all('Title', 'Country');
        //$lokacija = array_values($lokacija);
        //$lokacija->pluck('Title', 'Country');
        //$lokacija = pluck($lokacija);
        //$lokacija->all();

        //$lokacija = DB::table('lokacije')->get();

        //$lokacija = lokacija::table('lokacijas')->select('Title', 'Country')->get();



        return view('user.create', compact('lokacija'));
        return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(

            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required',
            'password'   => 'required',
            'lokacija'   => 'required'
        ));

        $user = new User;

        $user -> first_name = $request -> first_name;
        $user -> last_name  = $request -> last_name;
        $user -> email      = $request -> email;
        $user -> password   = Hash::make($request -> password);
        $user -> lokacija   = $request -> lokacija;

        $user ->save();

        //Session::flash('success', 'Korisnik uspjesno unesen!');

        //return redirect('welcome');
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
