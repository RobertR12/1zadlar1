@extends('main')

@section('title', '| Edit User')

@section('content')

    <div class="row">
        {!! Form::model($user, ['route'=>['user.update', $user->Id]]) !!}
        <div class="col-md-6">

            {{Form::label('First_name', 'First name:')}}<br><br>
            {{ Form::text('First_name', null, ["class"=> 'form-control']) }}<br><br>

            {{Form::label('Last_name', 'Last name:')}}<br><br>
            {{ Form::text('Last_name', null, ["class"=> 'form-control']) }}<br><br>

            {{Form::label('Email', 'Email:')}}<br><br>
            {{ Form::text('Email'), null, ["class"=> 'form-control'] }}<br><br>

            {{Form::label('Lokacija', 'Lokacija:')}}<br><br>
            {{ Form::text('Lokacija'), null, ["class"=> 'form-control'] }}


        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Korisnik kreiran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($user->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Korisnik ažuriran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($user->created_at)) }}</dd>
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