<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="HeyStars">
        <meta name="author" content="HeyStars">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="keyword" content="HeyStars">
        <title>Nhanduc - @yield('title')</title>
        <meta name="theme-color" content="#ffffff">
        <!-- Icons-->
        <link href="{{ asset('admin_statics/css/free.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_statics/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Main styles for this application-->

		<link href="{{ asset('admin_statics/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('admin_statics/bs-datetimepicker/pc-bootstrap4-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" />
		<link href="{{ asset('admin_statics/css/pace.min.css') }}" rel="stylesheet">
		@yield('css')
        <link href="{{ asset('admin_statics/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_statics/css/select2.min.css') }}" rel="stylesheet">


        <!-- Global site tag (gtag.js) - Google Analytics-->
        <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
            	dataLayer.push(arguments);
            }
            gtag('js', new Date());
            // layouts ID
            gtag('config', 'UA-118965717-3');
            // Bootstrap ID
            gtag('config', 'UA-118965717-5');
        </script>
    </head>
    <body class="c-app">
		<div class="opacity-bg d-flex justify-content-center align-items-center">
			<div class="loader"></div>
		</div>
        <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
            @include('admin.layouts.side')
            @include('admin.layouts.header')
            <div class="c-body">
                <main class="c-main">
                    @yield('content')
                </main>
            </div>
            @include('admin.layouts.footer')
        </div>
        <!-- CoreUI and necessary plugins-->
        <script src="{{ asset('admin_statics/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_statics/js/pace.min.js') }}"></script>
        <script src="{{ asset('admin_statics/js/coreui.bundle.min.js') }}"></script>
        <script src="{{ asset('admin_statics/js/coreui-utils.js') }}"></script>
		<script src="{{ asset('admin_statics/js/select2.full.min.js') }}"></script>
		<script src="{{ asset('admin_statics/js/main.js') }}"></script>
		@yield('javascript')
        <script src="{{ asset('admin_statics/js/custom.js') }}"></script>
    </body>
</html>
