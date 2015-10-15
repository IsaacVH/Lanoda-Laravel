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
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--3-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
				<h4 class="sub-header-title">
					CONTACTS
				</h4>
			</div>
			<div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
				<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect" style="text-align: center;">
					<div class="mdl-tabs__tab-bar" style="margin: 0 auto;">
						<a href="#show-all" class="mdl-tabs__tab filter-button is-active" data-filter="all">All</a>
						<a href="#show-friends" class="mdl-tabs__tab filter-button" data-filter="friends">Friends</a>
						<a href="#show-family" class="mdl-tabs__tab filter-button" data-filter="family">Family</a>
						<a href="#show-work" class="mdl-tabs__tab filter-button" data-filter="work">Work</a>
						<a href="#show-school" class="mdl-tabs__tab filter-button" data-filter="school">School</a>
					</div>
				</div>
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
