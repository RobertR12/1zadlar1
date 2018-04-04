@extends('main')

@section('title', '| All Users')

@section('content')

    <div class="row">

        <div class="col-md-6">
            <h1>All Users</h1>
        </div>
        <div class="col-md-4">
            <a href="{{route('user.create')}}" class="btn btn-lg btn-block btn-primary">Create new User</a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10">

            <table class="table">
                <thead>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Lokacija</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th>{{ $user->Id }}</th>
                            <td>{{ $user->First_name }}</td>
                            <td>{{ $user->Last_name }}</td>
                            <td>{{ $user->Email }}</td>
                            <td>{{ $user->Lokacija }}</td>
                            <td>{{ date('j M, Y, H:i', strtotime($user->created_at )) }}</td>
                            <td>{{ date('j M, Y, H:i', strtotime($user->updated_at )) }}</td>

                            <td>
                                <a href="{{ route('user.show', $user->Id) }}" class="btn btn-default btn-sm">View</a>
                                <a href="{{ route('user.edit', $user->Id) }}" class="btn btn-default btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection