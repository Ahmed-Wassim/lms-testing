<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'Auth')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/color_skins.css') }}">
</head>

<body class="theme-cyan">
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/logo-white.svg"
                            alt="Lucid">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">@yield('header')</p>
                        </div>
                        <div class="body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>