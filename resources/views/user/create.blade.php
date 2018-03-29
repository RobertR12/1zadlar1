@extends('main')

@section('title', '|Create new User')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Create New User</h1>
            <hr>

            {!! Form::open(['action' => 'UserController@store']) !!}

            {{Form::label('first_name', 'First name:')}}
            {{Form::text('first_name', null, array('class' => 'form-control'))}}<br>

            {{Form::label('last_name', 'Last name:')}}
            {{Form::text('last_name', null, array('class' => 'form-control'))}}<br>

            {{Form::label('email', 'Email:')}}
            {{Form::email('email', null, array('class' => 'form-control'))}}<br>

            {{Form::label('password', 'Password:')}}
            {{Form::password('password', null, array('class' => 'form-control'))}}<br>

            {{Form::label('lokacija', 'Lokacija:')}}<br>
            {{Form::select( 'lokacija', $lokacija, null, array('class' => 'form-control'))}}<br><br>




            {{Form::submit('Create User', $arrayName = array('class' => 'btn btn-success btn-lg btn-block' , ))}}<br>





            {!! Form::close() !!}
        </div>
    </div>
@endsection