<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\prijatelji;
use Session;
use DB;

class PrijateljController extends Controller
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

        //$prijatelj= User::all('Id','first_name', 'last_name');
        //$prijatelj->pluck('first_name', 'Id');





       //$prijatelj= collect(User::all())->pluck('First_name', 'Last_name');

        //$prijatelj= collect(User::all())->toArray();

        //>>$prijatelj = DB::table('users')->get();


        //$prijatelj= User::all('First_name', 'Last_name');

        //$prijatelj = User::all();
        //$prijatelj= $prijatelj->toArray();

        //$prijatelj= DB::table('users')->select('First_name', 'Last_name')->get();

        /*$prijatelji = User::all();
        $prijatelj = array();


        foreach ($prijatelji as $pri)
        {
            $prijatelj[]['Id']= $pri->attributes['Id'];
            $prijatelj[]['First_name']= $pri->attributes['First_name'];
        }

        return User::make( array($prijatelj));*/



        //$prijatelj = User::find();
       // return view('user.show')->with('user', $prijatelj);

        $prijatelj = DB::table('users')->get();

        return view('prijatelji.create', compact('prijatelj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prijatelji = new prijatelji;

        $prijatelji -> User_id = $request -> prijatelj1;
        $prijatelji -> Friend_id  = $request -> prijatelj2;


        $prijatelji ->save();

        Session::flash('success', 'Prijateljstvo uspješno uneseno!');
        return redirect()->route('prijatelji.show', $prijatelji->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('prijatelji.show');

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
