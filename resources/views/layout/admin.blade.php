<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- BEGIN META -->
    @include('shared.partial.meta')
    <!-- END META -->

    <title> {{ __('page-title.project-name') }} - @yield('page-title', __('page-title.default')) </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/img/favicon.ico') }}"/>

    <!-- BEGIN LOADER -->
    @include('shared.partial.loader')
    <!-- END LOADER -->

    <!-- BEGIN CSS -->
    @include('shared.css')
    <!-- END CSS -->
</head>
<body class="layout-boxed" page="starter-pack">

<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container container-xxl">
    @include('shared.partial.navbar')
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container " id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        @include('shared.partial.sidebar')
    </div>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @yield('page-breadcrumb')
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <!-- CONTENT AREA -->
                <div class="row layout-top-spacing">
                    @yield('page-content')
                </div>
                <!-- CONTENT AREA -->
            </div>
        </div>

        <div class="footer-wrapper">
            @include('shared.partial.footer')
        </div>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN JS -->
@include('shared.js')
<!-- END JS -->
</body>
</html>
