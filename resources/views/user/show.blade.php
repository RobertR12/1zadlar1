@extends('main')

@section('title', '| View User')

@section('content')
<div class="row">
    <div class="col-md-6">

        <h1>{{ $user->First_name }}<?php echo " ";?>{{ $user->Last_name }}</h1>

        <p class="lead">{{ $user->Email }}</p>


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
            <dl class="dl-horizontal">

                <dt>Korisnikov ID:</dt>
                <dd>{{$user->Id }}</dd>
            </dl>
        <hr>
        <div class="row">
            <div class="col-md-6">
                {!! Html::linkRoute('user.edit', 'Edit', array($user->Id), ['class' => 'btn btn-primary btn-block']) !!}

            </div>
            <div class="col-md-6">

                {!! Form::open(['route'=>['user.destroy', $user->Id], 'method' => 'DELETE']) !!}

                {!! Form::submit('Delete', ['class'  => 'btn btn-danger btn-block'] ) !!}

                {!! Form::close() !!}
            </div>
        </div>

        </div>
    </div>




</div>
<div class="row">
    <div class="col-md-6">
        <h2>Korisnikovi Prijatelji:</h2>
        <table class="table">
            <thead>
            <th>First name</th>
            <th>Last name</th>

            </thead>
            <tbody>
            @foreach($Npri as $Pri)
                <tr>
                    <th>{{ $Pri->FFname }}</th>
                    <td>{{ $Pri->FLname }}</td>
                </tr>

            @endforeach
            </tbody>
    </div>
</div>

<div class="row">
    <div class="col-md-6">



        <table class="table">
            <h2>Korisničke pretplate:</h2>
            <thead>
            <th>#</th>
            <th>Amount</th>
            <th>Created_at</th>
            <th>Updated_at</th>

            </thead>
            <tbody>
            @foreach($Npre as $Pre)
                <tr>
                    <th>{{ $Pre->ID }}</th>
                    <td>{{ $Pre->AMA }}</td>
                    <td>{{ $Pre->CA }}</td>
                    <td>{{ $Pre->UA }}</td>
                </tr>

            @endforeach
            </tbody>
    </div>
</div>


@endsection