<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Prijatelji;
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
        $prijatelji = Prijatelji::all();

        return view('prijatelji.index')->with('prijatelji', $prijatelji);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request, array(

            'prijatelj1' => 'required',
            'prijatelj2' => 'required'

        ));
        $prijatelji = new prijatelji;

        $prijatelji->User_id = $request->prijatelj1;
        $prijatelji->Friend_id  = $request->prijatelj2;


        $prijatelji->save();

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

        $prijatelji = Prijatelji::find($id);

        return view('prijatelji.show')->with('prijatelji', $prijatelji);

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
        $prijatelji = Prijatelji::find($id);
        $prijatelj = DB::table('users')->get();

        return view('prijatelji.edit')->with('prijatelji', $prijatelji)->with('prijatelj', $prijatelj);
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
            'prijatelj2' => 'required'
        ));

        $prijatelji = Prijatelji::find($id);

        $prijatelji->User_id = $request->input('prijatelj1');
        $prijatelji->Friend_id= $request->input('prijatelj2');

        $prijatelji->save();

        Session::flash('success', ' Prijateljstvo uspješno ažurirano');

        return redirect()->route('prijatelji.show', $prijatelji->Id);
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
