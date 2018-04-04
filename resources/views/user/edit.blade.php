@extends('main')

@section('title', '| Edit User')

@section('content')

    <div class="row">
        {!! Form::model($user, ['route'=>['user.update', $user->Id], 'method'=>'PUT']) !!}
        <div class="col-md-6">

            {{Form::label('first_name', 'First name:')}}<br><br>
            {{ Form::text('first_name', null, ["class"=> 'form-control']) }}<br><br>

            {{Form::label('last_name', 'Last name:')}}<br><br>
            {{ Form::text('last_name', null, ["class"=> 'form-control']) }}<br><br>

            {{Form::label('email', 'Email:')}}<br><br>
            {{ Form::text('email'), null, ["class"=> 'form-control'] }}<br><br>

            {!!Form::label('password', 'Password:')!!}<br><br>
            {!!Form::password('password', null, array('class' => 'form-control', 'required' => ''))!!}<br><br>

            {{Form::label('lokacija', 'Lokacija:')}}<br><br>
            {{ Form::text('lokacija'), null, ["class"=> 'form-control'] }}

            {{--<select name="lokacija">
                @foreach($lokacija as $lok)
                    <option value='{{$lok->Id}}'>{{$lok->title}}</option>
                @endforeach
            </select>--}}


        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Korisnik kreiran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($user->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Korisnik ažuriran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($user->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('user.show', 'Cancle', array($user->Id), ['class' => 'btn btn-danger btn-block']) !!}

                    </div>
                    <div class="col-md-6">

                        {{Form::submit('Save', ['class'=>'btn btn-success btn-block'])}}

                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection