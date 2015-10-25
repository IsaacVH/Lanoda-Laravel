<html>
    <head>
        <title>Lanoda - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/compiled-vendor.css" />
        @if(App::environment('local', 'staging'))
        	<link rel="stylesheet" href="/css/app.css" />
	    	@section('styles')

	    	@show
	    @else
	    	<link rel="stylesheet" href="/css/compiled.css" />
        @endif
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

		<!-- Scripts -->
		@if(App::environment('local', 'staging'))
	        <script src="/js/compiled.js"></script>
        @else
        	<script src="/js/app.js"></script>
			@section('scripts')

			@show
        @endif
    </body>
</html>
