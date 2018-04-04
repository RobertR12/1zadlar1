@extends('main')

@section('title', '| Edit Prijateljstvo')

@section('content')

    <div class="row">
        {!! Form::model($prijatelji, ['route'=>['prijatelji.update', $prijatelji->Id], 'method'=>'PUT']) !!}
        <div class="col-md-6">

            {{ Form::label('prijatelj1', 'Prijatelj1:') }}

            <select name="prijatelj1">
                @foreach($prijatelj as $prijatelj1)
                    <option value='{{$prijatelj1->Id}}'>{{$prijatelj1->First_name}}{{$prijatelj1->Last_name}}</option>
                @endforeach
            </select><br><br>


            {{ Form::label('prijatelj2', 'Prijatelj2:') }}

            <select name="prijatelj2">
                @foreach($prijatelj as $prijatelj2)
                    <option value='{{$prijatelj2->Id}}'>{{$prijatelj2->First_name}}{{$prijatelj2->Last_name}}</option>
                @endforeach
            </select><br><br>


        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Korisnik kreiran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($prijatelji->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Korisnik ažuriran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($prijatelji->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('prijatelji.show', 'Cancel', array($prijatelji->Id), ['class' => 'btn btn-danger btn-block']) !!}

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