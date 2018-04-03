<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\lokacija;
use Session;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create variable and store all users from db

        $users=User::all();

        // return view and pass in the above variable

        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$lokacija =lokacija::pluck('Title', 'Country');
        //$lokacija = array_values($lokacija);
        //$lokacija->pluck('Title', 'Country');
        //$lokacija = pluck($lokacija);
        //$lokacija->all();
        //$lokacija = lokacija::table('lokacije')->get();
        //$lokacija = lokacija::table('lokacijas')->select('Title', 'Country')->get();

        //>>$lokacija = lokacija::all('Title', 'Country');

//        $lokacija= collect(lokacija::all())
//                    ->sortBy('Title')
//                    ->pluck('Title');

        $lokacija = DB::table('lokacijas')->pluck('Title', 'Id');


        return view('user.create', compact('lokacija'));



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



        Session::flash('success', 'Korisnik uspješno unesen!');

        return redirect()->route('user.show', $user->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
       return view('user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lokacija = DB::table('lokacijas')->pluck('Title', 'Id');



        //find the user from db and save it as var

        $user= User::find($id);

        //return a view and pass in the var we prev created

        return view('user.edit')->with('user', $user)->with('lokacija', $lokacija);
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
        //Validate the data
        $this->validate($request, array(

            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required',
            'lokacija'   => 'required'
        ));

        //Save the data to db
        $user = User::find($id);

        $user->first_name =$request->input('first_name');
        //set flash data with success message

        //redirect with flash data to users.show
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
