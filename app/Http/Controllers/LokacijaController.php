<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokacija;
use App\User;
use Session;
use Mapper;
use DB;


class LokacijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create variable and store all lokacijas from db
        $lokacija = Lokacija::all();

        //return view and pass in the variable above
        return view('lokacija.index')->with('lokacija', $lokacija);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Mapper::map(45.82177,17.396965, ['draggable' => true]);

        return view('lokacija.create');
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

            'Title' => 'required|max:255',
            'Country' => 'required|max:255',

        ));

        $lokacija = new Lokacija;

        $lokacija->Title = $request->Title;
        $lokacija->Country = $request->Country;
        $lokacija->longt = $request->longt;
        $lokacija->langt = $request->langt;

        $lokacija->save();

        Session::flash('success', 'Lokacija uspjesno unesena!');

        return redirect()->route('lokacija.show', $lokacija->Id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lokacija = Lokacija::find($id);

        return view('lokacija.show')->with('lokacija', $lokacija);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lokacija = Lokacija::find($id);

        return view('lokacija.edit')->with('lokacija', $lokacija);
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
        $this->validate($request,array(

            'Title'=>'required|max:100',
            'Country'=>'required|max:100'
        ));

        //save the data to db
        $lokacija = Lokacija::find($id);

        $lokacija->Title = $request->input('Title');
        $lokacija->Country = $request->input('Country');


        $lokacija->save();

        //set flash data with success message

        Session::flash('success', ' Uspješno ažurirana lokacija!');

        //redirect with flash data to lokacija.show

        return redirect()->route('lokacija.show', $lokacija->Id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokacija = Lokacija::find($id);

        $lokacija->delete();

        Session::flash('success', ' Lokacija uspješno izbrisana!');

        return redirect()->route('lokacija.index');
    }
}
