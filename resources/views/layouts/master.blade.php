<html>
    <head>
        <title>Lanoda - @yield('title')</title>
        <link rel="stylesheet" href="/css/compiled.css" />
        <link rel="stylesheet" href="/css/app.css" />
        @section('styles')

        @show
    </head>
    <body>
    	<div class="error-bar">
    		@section('error')

    		@show
    	</div>

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
						<div class="search-bar" style="height: 100%;">
							<form action="#">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
									<label class="mdl-button mdl-js-button mdl-button--icon" for="search">
										<i class="material-icons">search</i>
									</label>
									<div class="mdl-textfield__expandable-holder">
										<input class="mdl-textfield__input" type="text" name="search" id="search" />
										<label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
									</div>
								</div>
							</form>
						</div>
						<div class="profile-icon">
							<img src=<?php if(isset($profileImage) && array_key_exists('file_url', $profileImage)) { echo "'".$profileImage['file_url']."'"; } ?> />
						</div>
					</div>
				</header>
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
        <script src="/js/compiled.js"></script>
        <script src="/js/app.js"></script>
		@section('scripts')

		@show
    </body>
</html>
