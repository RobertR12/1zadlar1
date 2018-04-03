@extends('main')

@section('title', '| View User')

@section('content')

        <h1>{{ $user->First_name }}<?php echo " ";?>{{ $user->Last_name }}</h1>
    <p class="lead">{{ $user->email }}</p>
@endsection