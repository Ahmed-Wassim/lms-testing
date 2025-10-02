@extends('dashboard.auth.main')

@section('title', 'Login')
@section('header', 'Login to your account')

@section('content')
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