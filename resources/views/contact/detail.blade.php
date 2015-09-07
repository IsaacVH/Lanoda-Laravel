@extends('layouts.sidebar')

@section('title', 'Contact Detail')

@section('styles')
	<link rel="stylesheet" href="/css/contact.css" />
@stop

@section('header')
	@parent
@stop

@section('sidebar')
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title">{{ $contact->firstname }} {{ $contact->middlename }} {{ $contact->lastname }}</span>
		<div><i class="material-icons">left arrow</i></div>
		<div>
			<div>{{ $contact->address }}</div>
		</div>
		<nav class="mdl-navigation">
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
		</nav>
	</div>
@stop

@section('content')
	<div class="sub-header" style="margin: 20px auto; padding: 0 10% 0 5%;">
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
		<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell loading-cell lanoda-hide"><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div></div>
		<!--foreach ($contacts as $contact)
			<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell">
				@include('contact.partials.contact-tile', ['contact'=>$contact])
			</div>
		endforeach
		-->
	</div>
@stop