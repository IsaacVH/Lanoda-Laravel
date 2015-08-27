@extends('layouts.auth')

@section('title', 'Sign Up')

@section('styles')
	<link rel="stylesheet" href="/css/form-card.css" />
@stop

@section('content')
	<!-- Wide card with share menu button -->
	<div class="mdl-card mdl-shadow--2dp lanoda-form-card">
		<div class="mdl-card__title"></div>
		<div class="mdl-card__supporting-text">
			<h2 class="mdl-card__title-text">Sign Up</h2>
		</div>

		<div class="lanoda-form mdl-card--border">
			<!-- Simple Textfield -->
			<form id="signupForm" method="POST" action="/auth/register">
				{!! csrf_field() !!}
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="first-name" name="firstname" />
					<label class="mdl-textfield__label" for="login-email">First Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="last-name" name="lastname" />
					<label class="mdl-textfield__label" for="login-email">Last Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" id="login-email" name="email" />
					<label class="mdl-textfield__label" for="login-email">Email</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="password" id="login-password" name="password" required />
					<label class="mdl-textfield__label" for="login-password">Password</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="password" id="login-password-confirm" />
					<label class="mdl-textfield__label" for="login-password-confirm">Confirm Password</label>
				</div>
				<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
					<input class="mdl-checkbox__input" type="checkbox" id="rememberme" />
					<span class="mdl-checkbox__label" for="remember-me">Remember Me</span>
				</label>
			</form>
		</div>

		<div class="mdl-card__actions mdl-card--border">
			<button onclick="javascript:$('#signupForm').submit()" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored lanoda-right">
				Sign Up
			</button>
			<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect lanoda-left" href="/auth/login">
				Log In
			</a>
		</div>
		<div class="mdl-card__menu">
			<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
				<i class="material-icons">share</i>
			</button>
		</div>
	</div>
@stop
