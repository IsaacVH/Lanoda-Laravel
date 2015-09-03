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
	<div class="contact-list mdl-grid">
		@foreach ($contacts as $contact)
			<div class="mdl-cell mdl-cell--3-col">
				<div class="contact-tile">
					<div class="contact-image-wrapper">
						@if ($contact->image_id != null)
							<img class="contact-image" src="{{ $contact->image_id }}" alt="contact-image-name">
						@else
							<i class="material-icons contact-icon">person</i>
						@endif
					</div>
					<div class="contact-name"><span>{{ $contact->firstname }}</span> <span>{{ $contact->lastname }}</span></div>
				</div>
			</div>
		@endforeach

		<div class="mdl-cell mdl-cell--3-col">
			<div id="createContact" class="contact-tile create-contact open-modal">
				<div class="contact-image-wrapper">
					<i class="material-icons contact-icon">person</i>
				</div>
				<div class="contact-plus-wrapper">
					<button id="contact-plus-button" class="contact-plus mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
						<i class="material-icons">add</i>
					</button>
					<div for="contact-plus-button" class="mdl-tooltip mdl-tooltip--large">
						Add New Contact
					</div>
				</div>
			</div>

			<div class="modal" for="createContact">
				<div class="mdl-card mdl-shadow--2dp lanoda-form-card">
					<div class="mdl-card--border">
						<!-- Simple Textfield -->
						<form id="createContactForm" method="POST" action="/contacts">
							{!! csrf_field() !!}
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
								<input class="mdl-textfield__input" type="text" name="firstname" id="login-firstname" />
								<label class="mdl-textfield__label" for="login-firstname">First Name</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
								<input class="mdl-textfield__input" type="text" name="middlename" id="login-middlename" />
								<label class="mdl-textfield__label" for="login-middlename">Middle Name</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
								<input class="mdl-textfield__input" type="text" name="lastname" id="login-lastname" />
								<label class="mdl-textfield__label" for="login-lastname">Last Name</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
								<input class="mdl-textfield__input" type="text" name="address" id="login-address" />
								<label class="mdl-textfield__label" for="login-address">Address</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
								<input class="mdl-textfield__input" type="text" name="birthday" id="login-birthday" />
								<label class="mdl-textfield__label" for="login-birthday">Birthday</label>
							</div>
						</form>
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<button onclick="javascript:$('#createContactForm').submit()" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored lanoda-right">
							Create
						</button>
						<button onclick="javascript:closeModal()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect lanoda-left">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
