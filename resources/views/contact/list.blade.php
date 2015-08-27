@extends('layouts.master')

@section('title', 'Contacts')

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
	<div class="sub-header" style="margin: 20px auto; padding: 0 10% 0 5%;">
		<h4 class="sub-header-title" style="margin: 0; float: left; height: 48px; line-height: 48px; font-weight: 300;">
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
	<div>
		<?php
			foreach ($contacts as $contact) {
				echo "<div>".var_dump($contact)."</div>";
			}
		?>
	</div>
@stop
