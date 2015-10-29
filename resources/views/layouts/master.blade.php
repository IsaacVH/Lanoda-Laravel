<html class="page-@yield('class')">
    <head>
        <title>Lanoda - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/img/lanoda-favicon.png">

		<!-- <link rel="stylesheet" href="/css/compiled-complete.css" media="all" /> -->
		<link rel="stylesheet" href="/css/compiled-vendor.css" media="all" />
		@section('top-styles')

		@show
    </head>
    <body>
    	<div class="error-bar">
    		@section('error')
    		@show
    	</div>

		<!-- Always shows a header, even in smaller screens. -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header @section('drawer') @show">

			@section('header')
				@include('layouts.partials.header')
			@show

	        @section('sidebar')
	        	<!-- sidebar will go here on sub views -->
	        @show

			<main class="mdl-layout__content">
				<div class="background-shadow"></div>
				<div class="page-content">
					@yield('content')
				</div>
			</main>
		</div>

		<!-- Styles -->
		<link rel="stylesheet" href="/css/app.css" media="all">
		@section('low-styles')

		@show
		<!-- Scripts -->
		<script src="/js/compiled-complete.js"></script>
    </body>
</html>
