<!doctype html>
<html lang="en">

<head>
    @include('dashboard.layouts.styles')
</head>

<body class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/logo-icon.svg"
                    width="48" height="48" alt="Lucid"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->

    <div id="wrapper">

        @include('dashboard.layouts.navbar')

        @include('dashboard.layouts.sidebar')

        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        {{-- <div class="col-lg-5 col-md-8 col-sm-12">
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                        class="fa fa-arrow-left"></i></a> Dashboard</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div> --}}
                        @yield('crumbs')
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>

    </div>

    @include('dashboard.layouts.scripts')
</body>

</html>