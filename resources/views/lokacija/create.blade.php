@extends('main')

@section('title', '|Unos lokacije')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Create New Lokacija</h1>
            <hr>

            {!! Form::open(['action' => 'LokacijaController@store', 'data-parsley-validate' => '']) !!}

            {{Form::label('Title', 'Title:')}}
            {{Form::text('Title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '70'))}}<br>

            {{Form::label('Country', 'Country:')}}
            {{Form::text('Country', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '70'))}}<br>


            {{Form::submit('Create Lokacija', ['class' => 'btn btn-success btn-lg btn-block' ])}}<br>

            {!! Form::close() !!}
        </div>
    </div>


@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection
@endsection