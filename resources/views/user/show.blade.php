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
            <dd>{{ date( 'j M, Y H:i', strtotime($user->created_at)) }}</dd>
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


@endsection