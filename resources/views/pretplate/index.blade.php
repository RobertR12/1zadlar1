@extends('main')

@section('title', '| All Users')

@section('content')

    <div class="row">

        <div class="col-md-6">
            <h1>All Pretplata</h1>
        </div>
        <div class="col-md-4">
            <a href="{{route('pretplatnik.create')}}" class="btn btn-lg btn-block btn-primary">Create new Pretplata</a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10">

            <table class="table">
                <thead>
                <th>#</th>
                <th>Ime i prezime pretplatnika</th>
                <th>Amount</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($pretplata as $pre)
                    <tr>
                        <th>{{ $pre->Id }}</th>
                        <td>{{ $pre->user1->First_name }} {{ $pre->user1->Last_name }}</td>
                        <td>{{ $pre->Amount }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($pre->created_at )) }}</td>
                        <td>{{ date('j M, Y, H:i', strtotime($pre->updated_at )) }}</td>

                        <td>
                            <a href="{{ route('pretplatnik.show', $pre->Id) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('pretplatnik.edit', $pre->Id) }}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection