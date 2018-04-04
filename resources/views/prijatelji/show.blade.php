@extends('main')

@section('title', '| View Prijateljstvo')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <h1> <?php echo "Prijateljstvo između ";?>{{ $prijatelji->User_id }}<?php echo " i ";?>{{ $prijatelji->Friend_id }}</h1>

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
                        {!! Html::linkRoute('prijatelji.destroy', 'Delete', array($prijatelji->Id), ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection