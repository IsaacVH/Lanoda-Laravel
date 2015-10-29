@extends('layouts.auth')

@section('title', 'Sign Up')
@section('class', 'auth-register')


@section('content')

	<div class="center-horizontal">
		<div class="center-vertical signup">
			<h3 class="text-center text-white text-bold">SIGN UP</h3>
			<div class="lanoda-card">
				<div class="lanoda-login-form">
					<form id="signupForm" method="POST" action="/auth/register">
					
						{!! csrf_field() !!}
						<div class="bordered-area">

							@if(session()->has('error'))
								<div class="error-message">{{ session('error') }}</div>
							@endif

							<div class="lanoda-textfield">
								<input type="text" id="first-name" name="firstname" data-placeholder="* First Name" placeholder="* First Name" />
							</div>
							<div class="lanoda-textfield">
								<input type="text" id="last-name" name="lastname" data-placeholder="* Last Name" placeholder="* Last Name" />
							</div>
							<div class="lanoda-textfield">
								<input type="email" id="login-email" name="email" data-placeholder="* Email" placeholder="* Email" required />
							</div>
							<div class="lanoda-textfield">
								<input type="password" id="login-password" name="password" data-placeholder="* Password" placeholder="* Password" required />
							</div>
							<div class="lanoda-textfield">
								<input type="password" id="login-password-confirm" data-placeholder="* Confirm Password" placeholder="* Confirm Password" required />
							</div>
							<div class="lanoda-checkbox">
								<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
									<input class="mdl-checkbox__input" type="checkbox" name="remeberme" id="remember-me" />
									<span for="remember-me" class="mdl-checkbox__label noselect">Remember Me</span>
								</label>
							</div>
						</div>
						<div class="control-area">
							<button type="button" class="cancel-button mdl-button mdl-js-button mdl-js-ripple-effect" onclick="window.location.href = '/auth/login'">
								Log In
							</button>
							<button type="submit" class="submit-button mdl-button mdl-js-button mdl-js-ripple-effect">
								Sign Up
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop
