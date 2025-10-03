@extends('dashboard.auth.main')

@section('title', 'Not Found')
@section('header', 'Not Found')

@section('content')
    <p>The page you were looking for could not be found, please <a href="javascript:void(0);">contact us</a> to report this
        issue.</p>
    <div class="margin-top-30">
        <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fa fa-arrow-left"></i> <span>Go
                Back</span></a>
        <a href="index.html" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a>
    </div>
@endsection