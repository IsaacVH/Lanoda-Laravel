@extends('layouts.master')

@section('title', 'Login')

@section('styles')
	<link rel="stylesheet" href="/css/contact.css" />
@stop

@section('header')
	
@stop

@section('sidebar')
	@parent
@stop

@section('content')
	<!-- Wide card with share menu button -->
	<div>
		<?php 
			foreach ($contacts as $contact) {
				echo '<br><div>$contact</div><br>'
			}
		?>
	</div>
@stop
