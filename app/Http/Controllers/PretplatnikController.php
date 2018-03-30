<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\pretplatnik;
use App\prijatelji;
use Session;
use DB;

class PretplatnikController extends Controller
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



        $prijatelj = DB::table('users')->pluck('First_name', 'Id');

       return view('pretplate.create', compact('prijatelj'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pretplata = new pretplatnik;

        $pretplata -> User_id = $request -> prijatelj1;
        $pretplata -> Amount  = $request -> Amount;


        $pretplata ->save();

        Session::flash('success', 'Pretplata uspješno unesena!');

        return redirect()->route('pretplatnik.show', $pretplata->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pretplate.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
