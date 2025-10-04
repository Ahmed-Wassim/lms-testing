<title>@yield('title', 'Dashboard')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

<link rel="stylesheet"
    href="{{ asset('dashboard/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/chartist/css/chartist.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('dashboard/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/toastr/toastr.min.css') }}">

@stack('styles')

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/color_skins.css') }}">

<style>
    .fl-wrapper {
        z-index: 999999 !important;
    }
</style>