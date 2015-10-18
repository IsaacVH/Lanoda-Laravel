@extends('layouts.sidebar')

@section('title', 'Contact Detail')

@section('styles')
	<link rel="stylesheet" href="/css/contact.css" />
	<link rel="stylesheet" href="/css/note.css" />
@stop

@section('header')
	@parent
@stop

<?php
	$noteTypeIdGeneral = 1;
	$noteTypeIdLikeDislike = 2;
	$noteTypeIdMemory = 3;
	$noteTypeIdReminder = 4;
	$noteTypeIdPhoto = 5;

	$invalid_characters = array("$", "%", "#", "<", ">", "|", "/", "\\");
?>

@section('sidebar')
	<div class="mdl-layout__drawer">
		<br />
		<span>
			<a href="/contacts">
				<label class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons text-black">arrow_back</i></label>
			</a>
		</span>
		<div class="text-center">
			<div class="profile-image-background">
				@if($contact->image_id != null) )
					<img src=" {{ $contact->image->file_url }} " />
				@else
					<div style="position: relative; background-color: lightgray; height: 100%; width: 100%; overflow: hidden; border-radius: 3px;">
						<i class="material-icons" style=" font-size: 180px;">person</i>
						<div class="shadow-overlay">
							<div class="mdl-button mdl-js-button add-image-button">Add an Image</div>
						</div>
					</div>
				@endif
			</div>
			<h5 class="text-center">{{ $contact->firstname }} <!--{{ $contact->middlename }}--> {{ substr($contact->lastname, 0, 1) }}.</h5>
			<div class="menu-item">{{ $contact->phone_number }}</div>
			<div class="menu-item">{{ $contact->email }}</div>
			<div class="menu-item">{{ $contact->address }}</div>
			<div class="menu-item">{{ $contact->relationship }}</div>

			
			<div class="hidden-menu" for="openContactOptions">
				<button id="deleteContactButton" class="mdl-button mdl-js-button mdl-button--icon">
					<i class="material-icons">delete</i>
				</button>
				<button id="editContactButton" class="mdl-button mdl-js-button mdl-button--icon">
					<i class="material-icons">edit</i>
				</button>
			</div>
			<button id="openContactOptions" class="mdl-button mdl-js-button open-hidden-menu">
				<i class="material-icons md-24">more_horiz</i>
			</button>
			
		</div>
	</div>

	<!-- Create Note Button -->
	<div style="z-index: 2; display: inline-block; position: absolute; bottom: 40px; right: 40px;">
		<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored open-modal" data-modal="createNoteModal">
			<i class="material-icons">add</i>
		</button>
	</div>
@stop

@section('content')
	<div class="sub-header">
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect" style="text-align: center;">
			<div class="mdl-tabs__tab-bar" style="display: inline-block; margin: 0 auto;">
				<a href="#show-all" class="mdl-tabs__tab is-active">all</a>
				@foreach ($noteTypes as $noteType)
					<a href="#show-{{ str_replace($invalid_characters, "-", $noteType->name) }}" class="mdl-tabs__tab">{{ $noteType->name }}</a>
				@endforeach
			</div>
		</div>
	</div>

	<div id="contactNoteList" class="note-list mdl-grid" data-contactid="{{ $contact->id }}">
		
		@include('note.list', compact($contact, $noteTypes))

	</div>

	@include('note.partials.note-create-modal', compact($contact, $noteTypes))
@stop


