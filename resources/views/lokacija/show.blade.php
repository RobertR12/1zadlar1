@extends('main')

@section('title', '| View Lokacija')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <h1>{{ $lokacija->Title }}, {{ $lokacija->Country }}</h1>

        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Lokacija kreirana:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($lokacija->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Lokacija ažurirana:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($lokacija->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('lokacija.edit', 'Edit', array($lokacija->Id), ['class' => 'btn btn-primary btn-block']) !!}

                    </div>
                    <div class="col-md-6">

                        {!! Form::open(['route'=>['lokacija.destroy', $lokacija->Id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class'  => 'btn btn-danger btn-block'] ) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection