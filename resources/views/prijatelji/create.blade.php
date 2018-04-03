@extends('main')

@section('title', '| Kreiranje prijatelja')
@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')



    <div class="row">
        <div class="col-md-8">
            <h1>Create New Prijateljstvo</h1>
            <hr>

            {!! Form::open(['action' => 'PrijateljController@store', 'data-parsley-validate' => '']) !!}

            {{Form::label('prijatelj1', 'Prijatelj1:')}}<br>
            {{Form::select( 'prijatelj1', $prijatelj, null, array('class' => 'form-control', 'required' => ''))}}<br><br>

            {{Form::label('prijatelj2', 'Prijatelj2:')}}<br>
            {{Form::select( 'prijatelj2', $prijatelj, null, array('class' => 'form-control', 'required' => ''))}}<br><br>


            {{Form::submit('Create Prijateljstvo', $arrayName = array('class' => 'btn btn-success btn-lg btn-block' , ))}}<br>


            {!! Form::close() !!}
        </div>
    </div>
@endsection