<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Lokacija;
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

        //$users=User::all();

        $users = User::with('lokacija')->get();
        //dd($users);
       // $loka = DB::table('Lokacijas')->where('Id', '=' , $users->Lokacija)->select('Title')->get();

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

        $lokacija = DB::table('lokacijas')->pluck('Title', 'Title');


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
            'last_name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'lokacija' => 'required'
        ));

        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->lokacija = $request->lokacija;

        $user->save();

        Session::flash('success', 'Korisnik uspješno unesen!');

        return redirect()->route('user.show', $user->Id);

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

        $Npri = DB::table('users as U')
                    ->leftJoin('prijateljis as F', 'U.Id','=', 'F.User_id')
                    ->leftJoin('users as N','F.Friend_id', '=', 'N.Id')
                    ->where('U.Id','=', $id)
                    ->select('N.First_name as FFname', 'N.Last_name as FLname')
                    ->get();

        $Npre = DB::table('users as U')
                        ->join('pretplatniks as UP', 'U.Id', '=', 'UP.user_id')
                        ->where('UP.user_id', '=', $id)
                        ->select('UP.Id as ID','UP.Amount as AMA','UP.created_at as CA','UP.updated_at as UA')
                        ->get();




       return view('user.show')->with('user', $user)->with('Npri', $Npri)->with('Npre', $Npre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $lokacija = DB::table('lokacijas')->pluck('Title', 'Title');



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

            'First_name'=>'required|max:100',
            'Last_name'=>'required|max:100',
            'Email'=>'required',
            'Password'=>'required',
            'Lokacija'=>'required'
        ));

        //Save the data to db
        $user = User::find($id);

        $user->First_name = $request->input('First_name');
        $user->Last_name = $request->input('Last_name');
        $user->Email = $request->input('Email');
        $user->Password = $request->input('Password');
        $user->Lokacija = $request->input('Lokacija');

        /*$input = $request->all();

        $user->fill($input)->save();*/

        $user->save();

        //set flash data with success message
        Session::flash('success', ' Korisnik uspješno ažuriran!');

        //redirect with flash data to users.show

        return redirect()->route('user.show', $user->Id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        $user->delete();

        Session::flash('success', ' Korisnik uspješno izbrisan!');

        return redirect()->route('user.index');
    }


}
