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
                    <th>Korisnik</th>
                    <th>Prijatelj</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($prijatelji as $pri)
                    <tr>
                        <th>{{ $pri->Id }}</th>
                            <td>{{ $pri->user->First_name }} {{ $pri->user->Last_name }}</td>
                            <td>{{ $pri->user2->First_name}} {{ $pri->user2->Last_name }}</td>
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