@extends('main')

@section('title', '|Unos lokacije')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Create New Lokacija</h1>
            <hr>

            {!! Form::open(['action' => 'LokacijaController@store']) !!}

            {{Form::label('Title', 'Title:')}}
            {{Form::text('Title', null, array('class' => 'form-control'))}}<br>

            {{Form::label('Country', 'Country:')}}
            {{Form::text('Country', null, array('class' => 'form-control'))}}<br>


            {{Form::submit('Create Lokacija', $arrayName = array('class' => 'btn btn-success btn-lg btn-block' , ))}}<br>


            {!! Form::close() !!}
        </div>
    </div>
@endsection