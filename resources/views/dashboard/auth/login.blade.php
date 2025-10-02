@extends('dashboard.auth.main')

@section('title', 'Login')
@section('header', 'Login to your account')

@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-auth-small" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="control-label sr-only">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
        </div>
        <div class="form-group">
            <label for="password" class="control-label sr-only">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>

        </div>
        <div class="form-group clearfix">
            <label class="fancy-checkbox element-left">
                <input type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
        <div class="bottom">
            <span class="helper-text m-b-10">
                <i class="fa fa-lock"></i>
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </span>
            <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
        </div>
    </form>
@endsection