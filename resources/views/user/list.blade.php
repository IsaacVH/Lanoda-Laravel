@extends('layouts.master')

@section('title', 'Login')

@section('class', 'user-list')

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
			foreach ($users as $user) {
				var_dump($user);
				echo "<br><br> And the next: <br>";
			}
		?>
	</div>
@stop
