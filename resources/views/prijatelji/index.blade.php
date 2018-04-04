@extends('main')

@section('title', '| All Prijatelji')

@section('content')

    <div class="row">

        <div class="col-md-6">
            <h1>All Prijateljstvo</h1>
        </div>
        <div class="col-md-4">
            <a href="{{route('prijatelji.create')}}" class="btn btn-lg btn-block btn-primary">Create new Prijateljstvo</a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10">

            <table class="table">
                <thead>
                <th>#</th>
                <th>User_id</th>
                <th>Friend_id</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($prijatelji as $pri)
                    <tr>
                        <th>{{ $pri->Id }}</th>
                        <td>{{ $pri->User_id }}</td>
                        <td>{{ $pri->Friend_id }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($pri->created_at )) }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($pri->updated_at )) }}</td>

                        <td>
                            <a href="{{ route('prijatelji.show', $pri->Id) }}" class="btn btn-success btn-sm">View</a>
                            <a href="{{ route('prijatelji.destroy', $pri->Id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection