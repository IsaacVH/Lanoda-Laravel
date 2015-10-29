@extends('layouts.sidebar')

@section('title', 'Contact Detail')
@section('class', 'contact-detail')


@section('low-styles')
	<link rel="stylesheet" href="/css/contact.css" />
	<link rel="stylesheet" href="/css/note.css" />
@stop

@section('header')
	@parent
@stop

<?php
	$invalid_characters = array("$", "%", "#", "<", ">", "|", "/", "\\");
?>

@section('sidebar')
	<div class="mdl-layout__drawer">
		<br />
		<span>
			<a href="/contacts">
				<label class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons text-black">arrow_back</i></label>
			</a>
			<span href="#" class="lanoda-right close-drawer-button">
				<label class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons text-black">close</i></label>
			</span>
		</span>
		<div class="text-center">
			<div class="profile-image-background">
				@if($contact->image_id != null) )
					<img src=" {{ $contact->image->file_url }} " />
				@else
					<div class="profile-image-gray">
						<i class="material-icons" style="font-size: 180px;">person</i>
						<div class="shadow-overlay">
							<div class="mdl-button mdl-js-button add-image-button">Add an Image</div>
						</div>
					</div>
				@endif
			</div>
			<h5 class="text-center">{{ $contact->firstname }} {{ substr($contact->lastname, 0, 1) }}. <span>{{ $contact->age != null ? $contact->age : "" }}</span></h5>
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
		<div style="text-center">
			<a class="normalize-link" href="#" onclick="$('.noteType-tab').removeClass('selected'); $(this).find('.noteType-tab').addClass('selected');">
				<div class="inline-block text-center" style="width: 100px;">
					<div class="inline-block text-center noteType-tab all selected">
						<div class="text-capitalize">All</div>
						<div class="number">{{ $contact->notes->count() }}</div>
					</div>
				</div>
			</a>
			@foreach($noteTypes as $noteType)
				<a class="normalize-link" href="#show-{{ str_replace($invalid_characters, '-', $noteType->name) }}" onclick="$('.noteType-tab').removeClass('selected'); $(this).find('.noteType-tab').addClass('selected');">
					<div class="inline-block text-center" style="width: 100px;">
						<div class="inline-block text-center noteType-tab {{ str_replace($invalid_characters, '-', $noteType->name) }}">
							<div class="text-capitalize">{{ $noteType->name }}</div>
							<div class="number">{{ $contact->notes->where('type_id', $noteType->id)->count() }}</div>
						</div>
					</div>
				</a>
			@endforeach
		</div>
	</div>

	<div id="contactNoteList" class="note-list mdl-grid" data-contactid="{{ $contact->id }}">
		@include('note.partials.note-list', compact($contact, $noteTypes))
	</div>

	@include('note.partials.note-create-modal', compact($contact, $noteTypes))
@stop


