@extends('layouts.master')

@section('title', 'Login')

@section('styles')
	<link rel="stylesheet" href="/css/profile.css" />
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
			echo "<table>";
			foreach ($user as $key => $value) {
				echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
			}
			echo "</table>";
		?>
	</div>
@stop
