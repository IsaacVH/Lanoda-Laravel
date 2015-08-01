@extends('layouts.auth')

@section('title', 'Login')

@section('styles')
	<link rel="stylesheet" href="/css/login.css" />
@stop

@section('header')
	
@stop

@section('sidebar')
	@parent
@stop

@section('content')
	<!-- Wide card with share menu button -->
	<div class="mdl-card mdl-shadow--2dp lanoda-login-card">
		<div class="mdl-card__title"></div>
		<div class="mdl-card__supporting-text">
			<h2 class="mdl-card__title-text">Log In</h2>
		</div>

		<div class="lanoda-form mdl-card--border">
			<!-- Simple Textfield -->
			<form action="#">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="login-email" />
					<label class="mdl-textfield__label" for="login-email">Email</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="password" id="login-password" />
					<label class="mdl-textfield__label" for="login-password">Password</label>
				</div>
			</form>
		</div>

		<div class="mdl-card__actions mdl-card--border">
			<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect lanoda-left" href="/signup">
				Sign Up
			</a>
			<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored lanoda-right">
				Log In
			</button>
		</div>
		<div class="mdl-card__menu">
			<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
				<i class="material-icons">share</i>
			</button>
		</div>
	</div>
@stop
