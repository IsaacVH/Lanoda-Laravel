@extends('layouts.master')

@section('title', 'Contact List')

@section('styles')
	<link rel="stylesheet" href="/css/contact.css" />
@stop

@section('header')
	@parent
@stop

@section('sidebar')
	<!-- No sidebar -->
@stop

@section('content')
	<div class="sub-header">
		<h4 class="sub-header-title">
			CONTACT PAGE
		</h4>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect" style="text-align: center;">
			<div class="mdl-tabs__tab-bar" style="display: inline-block; margin: 0 auto;">
				<a href="#show-all" class="mdl-tabs__tab is-active">All</a>
				<a href="#show-friends" class="mdl-tabs__tab">Friends</a>
				<a href="#show-family" class="mdl-tabs__tab">Family</a>
				<a href="#show-work" class="mdl-tabs__tab">Work</a>
				<a href="#show-school" class="mdl-tabs__tab">School</a>
			</div>
		</div>
	</div>
	<div class="contact-list mdl-grid">
		<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell loading-cell lanoda-hide">
			<div class="spinner-wrapper">
				<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
			</div>
		</div>
		@foreach ($user->contacts as $contact)
			<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell">
				@include('contact.partials.contact-tile', compact($contact))
			</div>
		@endforeach
	
		<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell">
			@include('contact.partials.contact-create-tile')
		</div>
	</div>
@stop
