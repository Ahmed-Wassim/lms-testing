@extends('dashboard.auth.main')

@section('title', 'Forgot Password')
@section('header', 'Recover my password')

@section('content')
    <p>Please enter your email address below to receive instructions for resetting your password.</p>

    {{-- Success Message --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

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

    <form class="form-auth-small" method="POST" action="{{ route('password.email') }}">
        @csrf
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

        <button type="submit" class="btn btn-primary btn-lg btn-block">RESET PASSWORD</button>

        <div class="bottom">
            <span class="helper-text">Know your password? <a href="{{ route('login') }}">Login</a></span>
        </div>
    </form>
@endsection