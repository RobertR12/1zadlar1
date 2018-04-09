@extends('main')

@section('title', '| View User')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <h1>Pretplata ID: {{ $pretplata->Id}}</h1>

            <h2><p class="lead">{{ $pretplata->Amount }} kn</p></h2>
        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Pretplata kreirana:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($pretplata->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Pretplata ažurirana:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($pretplata->created_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('pretplatnik.edit', 'Edit', array($pretplata->Id), ['class' => 'btn btn-primary btn-block']) !!}

                    </div>
                    <div class="col-md-6">

                        {!! Form::open(['route'=>['pretplatnik.destroy', $pretplata->Id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class'  => 'btn btn-danger btn-block'] ) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection