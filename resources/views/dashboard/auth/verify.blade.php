@extends('dashboard.auth.main')

@section('title', 'Email Verification')
@section('header', 'Verify Your Email Address')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <p class="mb-4">
        Before proceeding, please check your email for a verification link.
        If you did not receive the email, you can request another below.
    </p>

@endsection