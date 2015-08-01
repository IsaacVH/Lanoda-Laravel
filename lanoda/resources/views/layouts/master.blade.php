<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="/css/compiled.css" />
        <link rel="stylesheet" href="/css/app.css" />
        @section('styles')

        @show
    </head>
    <body>
		<!-- Always shows a header, even in smaller screens. -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
			@section('header')
				<header class="mdl-layout__header">
					<div class="mdl-layout__header-row">
						<!-- Title -->
						<span class="mdl-layout-title"><img class="lanoda-header-logo" src="/img/logo/lanoda-logo-white.png" /></span>
						<!-- Add spacer, to align navigation to the right -->
						<div class="mdl-layout-spacer"></div>
						<!-- Navigation. We hide it in small screens. -->
						<nav class="mdl-navigation mdl-layout--large-screen-only">
							<a class="mdl-navigation__link" href="">Link</a>
							<a class="mdl-navigation__link" href="">Link</a>
							<a class="mdl-navigation__link" href="">Link</a>
							<a class="mdl-navigation__link" href="">Link</a>
						</nav>
					</div>
				</header>
			@show
	        @section('sidebar')
	        	<!-- sidebar will go here on sub views -->
	        @show
			<main class="mdl-layout__content">
				<div class="page-content">@yield('content')</div>
			</main>
		</div>

		<!-- Scripts -->
        <script src="/js/compiled.js"></script>
        <script src="/js/app.js"></script>
		@section('scripts')

		@show
    </body>
</html>
