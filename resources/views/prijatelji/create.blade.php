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

            <?php /*print_r($prijatelj);*/?>

            {!! Form::open(['action' => 'PrijateljController@store']) !!}

            {{ Form::label('prijatelj1', 'Prijatelj1:') }}

            <select name="prijatelj1">
                    @foreach($prijatelj as $prijatelj1)
                        <option value='{{$prijatelj1->Id}}'>{{$prijatelj1->First_name}}{{$prijatelj1->Last_name}}</option>
                    @endforeach
            </select><br><br>


            {{ Form::label('prijatelj2', 'Prijatelj2:') }}

            <select name="prijatelj2">
                @foreach($prijatelj as $prijatelj2)
                    <option value='{{$prijatelj2->Id}}'>{{$prijatelj2->First_name}}{{$prijatelj2->Last_name}}</option>
                @endforeach
            </select><br><br>


            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}

            {!! Form::close() !!}

        </div>
    </div>
@endsection