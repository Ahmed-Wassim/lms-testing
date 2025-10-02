@extends('dashboard.auth.main')

@section('title', 'Register')
@section('header', 'Create an account')

@section('content')
    <form class="form-auth-small" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label sr-only">Name</label>
            <input type="name" name="name" class="form-control" id="name" placeholder="Your name" required>
            @error('name')
                <ul class="parsley-errors-list filled" id="parsley-id-name">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="control-label sr-only">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Your email" required>
            @error('email')
                <ul class="parsley-errors-list filled" id="parsley-id-email">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="control-label sr-only">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            @error('password')
                <ul class="parsley-errors-list filled" id="parsley-id-password">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="control-label sr-only">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="Confirm Password" required>
            @error('password_confirmation')
                <ul class="parsley-errors-list filled" id="parsley-id-password-confirmation">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
        <div class="bottom">
            <span class="helper-text">Already have an account? <a href="{{ route('login') }}">Login</a></span>
        </div>
    </form>

    <div class="separator-linethrough"><span>OR</span></div>
    <button class="btn btn-signin-social">
        <i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook
    </button>
    <button class="btn btn-signin-social">
        <i class="fa fa-twitter twitter-color"></i> Sign in with Twitter
    </button>
@endsection