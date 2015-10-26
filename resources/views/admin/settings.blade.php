@extends('layouts.master')

@section('title', 'Settings')

@section('content')
	<div style="padding: 30px;">
		<h3>Settings</h3>
		<table>
			<tr>
				<td>APP_ENV</td><td>:&nbsp;&nbsp;</td><td>{{ env("APP_ENV") }}</td>
			</tr>
			<tr>
				<td>APP_DEBUG</td><td>:&nbsp;&nbsp;</td><td>{{ env("APP_DEBUG") }}</td>
			</tr>
			<tr>
				<td>APP_KEY</td><td>:&nbsp;&nbsp;</td><td>{{ env("APP_KEY") }}</td>
			</tr>
			<tr>
				<td>&nbsp;</td><td></td><td></td>
			</tr>
			<tr>
				<td>DB_HOST</td><td>:&nbsp;&nbsp;</td><td>{{ env("DB_HOST") }}</td>
			</tr>
			<tr>
				<td>DB_DATABASE</td><td>:&nbsp;&nbsp;</td><td>{{ env("DB_DATABASE") }}</td>
			</tr>
			<tr>
				<td>DB_USERNAME</td><td>:&nbsp;&nbsp;</td><td>{{ env("DB_USERNAME") }}</td>
			</tr>
			<tr>
				<td>DB_PASSWORD</td><td>:&nbsp;&nbsp;</td><td>{{ env("DB_PASSWORD") }}</td>
			</tr>
		</table>
	</div>
@endsection


