<!DOCTYPE html>
<html>
	<head>
		<base href="./">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="HeyStars">
		<meta name="author" content="HeyStars">
		<meta name="keyword" content="HeyStars">
		<title>Nhanduc - 로그인 페이지</title>
		<meta name="theme-color" content="#ffffff">

		<!-- Main styles for this application-->
		<link href="{{ asset('admin_statics/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_statics/css/custom.css') }}" rel="stylesheet">

		@yield('css')
	</head>

	<body class="c-app flex-row align-items-center">
		@yield('content')

		<!-- CoreUI and necessary plugins-->
        <script src="{{ asset('admin_statics/js/jquery.min.js') }}"></script>
		<script src="{{ asset('admin_statics/js/coreui.bundle.min.js') }}"></script>
		@yield('javascript')
	</body>
</html>
