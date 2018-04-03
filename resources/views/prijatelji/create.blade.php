@extends('main')

@section('title', '| Kreiranje prijatelja')
@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')



    <div class="row">
        <div class="col-md-8">
            <h1>Create New Prijateljstvo</h1>
            <hr>

            {{--{!! Form::open(['action' => 'PrijateljController@store', 'data-parsley-validate' => '']) !!}

            {{Form::label('prijatelj1', 'Prijatelj1:')}}<br>
            {{Form::select( 'prijatelj1', $prijatelj, null, array('class' => 'form-control', 'required' => ''))}}<br><br>

            {{Form::label('prijatelj2', 'Prijatelj2:')}}<br>
            {{Form::select( 'prijatelj2', $prijatelj, null, array('class' => 'form-control', 'required' => ''))}}<br><br>


            {{Form::submit('Create Prijateljstvo', $arrayName = array('class' => 'btn btn-success btn-lg btn-block' , ))}}<br>


            {!! Form::close() !!}--}}



           <form action="{{Html::linkRoute('prijatelji.store', 'Store')}}">


                <lable>prijatelj1:</lable><br><br>
                <select name="prijatelj1">

                    @foreach($prijatelj as $prijatelj1)
                            <option value='{{$prijatelj1->Id}}'>{{$prijatelj1->First_name}}{{$prijatelj1->Last_name}}</option>
                    @endforeach
                </select><br><br>

                <lable>prijatelj2:</lable><br><br>

                <select name="prijatelj2">

                    @foreach($prijatelj as $prijatelj2)
                        <option value='{{$prijatelj2->Id}}'>{{$prijatelj2->First_name}}{{$prijatelj2->Last_name}}</option>
                    @endforeach

                </select><br><br>

                    <input type="submit" value="Submit">

            </form>





        </div>
    </div>
@endsection