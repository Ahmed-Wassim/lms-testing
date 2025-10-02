@extends('dashboard.auth.main')

@section('title', 'Reset Password')
@section('header', 'Reset your password')

@section('content')
    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-auth-small" method="POST" action="{{ route('password.update') }}">
        @csrf
        {{-- Token hidden field (provided in reset link) --}}
        <input type="hidden" name="token" value="{{ $request->token }}">

        <div class="form-group">
            <label for="email" class="control-label sr-only">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Your email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <ul class="parsley-errors-list filled" id="parsley-id-email">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="control-label sr-only">New Password</label>
            <input type="password" name="password" id="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="New password" required>
            @error('password')
                <ul class="parsley-errors-list filled" id="parsley-id-password">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="control-label sr-only">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm new password"
                required>
            @error('password_confirmation')
                <ul class="parsley-errors-list filled" id="parsley-id-password-confirmation">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">RESET PASSWORD</button>

        <div class="bottom">
            <span class="helper-text">Remembered your password?
                <a href="{{ route('login') }}">Login</a>
            </span>
        </div>
    </form>
@endsection