@extends('main')

@section('title', '| View User')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <h1>{{ $pretplata->Id}}</h1>

            <p class="lead">{{ $pretplata->Amount }}</p>
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
                        {!! Html::linkRoute('pretplatnik.destroy', 'Delete', array($pretplata->Id), ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection