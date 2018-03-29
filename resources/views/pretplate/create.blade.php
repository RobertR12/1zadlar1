@extends('main')

@section('title', '| Kreiranje prijatelja')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Create New Pretplata</h1>
            <hr>

            {!! Form::open(['action' => 'PretplatnikController@store']) !!}

            {{Form::label('prijatelj1', 'Prijatelj1:')}}<br>
            {{Form::select( 'prijatelj1', $prijatelj, null, array('class' => 'form-control'))}}<br><br>

            {{Form::label('Amount', 'Iznos pretplate:')}}
            {{Form::number('Amount', null, array('class' => 'form-control'))}}<br>


            {{Form::submit('Create Pretplata', $arrayName = array('class' => 'btn btn-success btn-lg btn-block' , ))}}<br>


            {!! Form::close() !!}
        </div>
    </div>
@endsection