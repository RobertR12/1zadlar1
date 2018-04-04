@extends('main')

@section('title', '| All Lokacija')

@section('content')

    <div class="row">

        <div class="col-md-6">
            <h1>All lokacija</h1>
        </div>
        <div class="col-md-4">
            <a href="{{route('lokacija.create')}}" class="btn btn-lg btn-block btn-primary">Create new Lokacija</a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10">

            <table class="table">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Country</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($lokacija as $lok)
                    <tr>
                        <th>{{ $lok->Id }}</th>
                        <td>{{ $lok->Title }}</td>
                        <td>{{ $lok->Country }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($lok->created_at )) }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($lok->updated_at )) }}</td>

                        <td>
                            <a href="{{ route('lokacija.show', $lok->Id) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('lokacija.edit', $lok->Id) }}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection