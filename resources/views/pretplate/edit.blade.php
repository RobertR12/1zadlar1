@extends('main')

@section('title', '| Edit Pretplata')

@section('content')

    <div class="row">
        {!! Form::model($pretplata, ['route'=>['pretplatnik.update', $pretplata->Id], 'method'=>'PUT']) !!}
        <div class="col-md-6">

            {{Form::label('prijatelj1', 'Pretplatnik:')}}<br><br>


            <select name="prijatelj1">
                @foreach($prijatelj as $prijatelj1)
                    <option value='{{$prijatelj1->Id}}'>{{$prijatelj1->First_name}}{{$prijatelj1->Last_name}}</option>
                @endforeach
            </select><br><br>

            {{Form::label('Amount', 'Amount:')}}<br><br>
            {{ Form::number('Amount', null, ["class"=> 'form-control']) }}<br><br>



        </div>
        <div class="col-md-6">
            <div class="well">
                <dl class="dl-horizontal">

                    <dt>Korisnik kreiran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($pretplata->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">

                    <dt>Korisnik ažuriran:</dt>
                    <dd>{{ date( 'j M, Y H:i', strtotime($pretplata->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('pretplatnik.show', 'Cancle', array($pretplata->Id), ['class' => 'btn btn-danger btn-block']) !!}

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