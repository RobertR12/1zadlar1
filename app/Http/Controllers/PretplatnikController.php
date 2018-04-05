<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pretplatnik;
use App\Prijatelji;
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
        $pretplata = Pretplatnik::all();

        return view('pretplate.index')->with('pretplata', $pretplata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$prijatelj = DB::table('users')->pluck('First_name', 'Id');

        $prijatelj = DB::table('users')->get();
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
        $this->validate($request, array(

            'prijatelj1' => 'required',
            'Amount' => 'required'
        ));

        $pretplata = new Pretplatnik;

        $pretplata->User_id = $request->prijatelj1;
        $pretplata->Amount = $request->Amount;


        $pretplata->save();

        Session::flash('success', ' Pretplata uspješno unesena!');

        return redirect()->route('pretplate.show', $pretplata->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pretplata = Pretplatnik::find($id);

        return view('pretplate.show')->with('pretplata', $pretplata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pretplata =  Pretplatnik::find($id);
        $prijatelj = DB::table('users')->get();

        return view('pretplate.edit')->with('pretplata', $pretplata)->with('prijatelj', $prijatelj);

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
        $this->validate($request, array(

            'prijatelj1' => 'required',
            'Amount' => 'required'
        ));

        $pretplata = Pretplatnik::find($id);

        $pretplata->user_id = $request->input('prijatelj1');
        $pretplata->Amount = $request->input('Amount');

        $pretplata->save();

        return redirect()->route('pretplatnik.show', $pretplata->Id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pretplata = Pretplatnik::find($id);

        $pretplata->delete();

        Session::flash('success', ' Pretplata uspješno izbrisana!');

        return redirect()->route('pretplatnik.index');
    }
}
