@extends('layouts.auth')

@section('title', 'Login')

@section('class', 'auth-login')

@section('content')

	<div class="center-horizontal">
		<div class="center-vertical login">
			<h3 class="text-center text-white text-bold">LOG IN</h3>
			<div class="lanoda-card">
				<div class="lanoda-login-form">
					<form id="loginForm" method="POST" action="/auth/login">

						{!! csrf_field() !!}
						<div class="bordered-area">

							@if(session()->has('error'))
								<div class="error-message">{{ session('error') }}</div>
							@endif

							<div class="lanoda-textfield">
								<input type="email" name="email" id="login-email" data-placeholder="* Email" placeholder="* Email" required />
							</div>
							<div class="lanoda-textfield">
								<input type="password" name="password" id="login-password" data-placeholder="* Password" placeholder="* Password" required />
							</div>
							<div class="lanoda-checkbox">
								<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
									<input class="mdl-checkbox__input" type="checkbox" name="rememberme" id="remember-me" />
									<span for="remember-me" class="mdl-checkbox__label noselect">Remember Me</span>
								</label>
							</div>
						</div>
						<div class="control-area">
							<button type="button" class="cancel-button mdl-button mdl-js-button mdl-js-ripple-effect" onclick="window.location.href='/auth/register'">
								Sign Up
							</button>
							<button type="submit" class="submit-button mdl-button mdl-js-button mdl-js-ripple-effect">
								Log In
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop
