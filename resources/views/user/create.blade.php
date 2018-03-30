@extends('main')

@section('title', '|Create new User')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <?php //var_dump($lokacija);?>


    <div class="row">
        <div class="col-md-8">
            <h1>Create New User</h1>
            <hr>

            {!! Form::open(['action' => 'UserController@store', 'data-parsley-validate' => '']) !!}

            {!!Form::label('first_name', 'First name:')!!}
            {!!Form::text('first_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '80'))!!}<br>

            {!!Form::label('last_name', 'Last name:')!!}
            {!!Form::text('last_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))!!}<br>

            {!!Form::label('email', 'Email:')!!}
            {!!Form::email('email', null, array('class' => 'form-control', 'required' => ''))!!}<br>

            {!!Form::label('password', 'Password:')!!}
            {!!Form::password('password', null, array('class' => 'form-control', 'required' => ''))!!}<br>

            {!!Form::label('lokacija', 'Lokacija:')!!}<br>
            {!!Form::select( 'lokacija', $lokacija, null, array('class' => 'form-control', 'required' => ''))!!}<br><br>




            {!!Form::submit('Create User', $arrayName = array('class' => 'btn btn-success btn-lg btn-block' , ))!!}<br>





            {!! Form::close() !!}
        </div>
    </div>
@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection

@endsection