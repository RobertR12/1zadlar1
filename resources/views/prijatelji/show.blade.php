@extends('main')

@section('title', '| View Prijateljstvo')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <h1>Prijateljstvo između {{ $prijatelji->user->First_name }} {{ $prijatelji->user->Last_name }} i {{ $prijatelji->user2->First_name}} {{ $prijatelji->user2->Last_name }}</h1>

        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Prijateljstvo kreirano:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($prijatelji->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Prijateljstvo ažurirano:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($prijatelji->created_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">

                    <div class="col-md-6">
                        {!! Html::linkRoute('prijatelji.index', 'Return', array($prijatelji->Id), ['class' => 'btn btn-default btn-block']) !!}
                    </div>

                    <div class="col-md-6">

                        {!! Form::open(['route'=>['prijatelji.destroy', $prijatelji->Id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class'  => 'btn btn-danger btn-block'] ) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection