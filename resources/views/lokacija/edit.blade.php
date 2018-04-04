@extends('main')

@section('title', '| Edit Lokacija')

@section('content')

    <div class="row">
        {!! Form::model($lokacija, ['route'=>['lokacija.update', $lokacija->Id], 'method'=>'PUT']) !!}
        <div class="col-md-6">

            {{Form::label('Title', 'Title:')}}<br><br>
            {{ Form::text('Title', null, ["class"=> 'form-control']) }}<br><br>

            {{Form::label('Country', 'Country:')}}<br><br>
            {{ Form::text('Country', null, ["class"=> 'form-control']) }}<br><br>


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
                        {!! Html::linkRoute('user.show', 'Cancle', array($lokacija->Id), ['class' => 'btn btn-danger btn-block']) !!}

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