@extends('dashboard.auth.main')

@section('title', 'Login')
@section('header', 'Login to your account')

@section('content')
    <p>{{ $message }}
        <br>Please try after some time.
    </p>
    <p><a href="index.html" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a></p>
@endsection