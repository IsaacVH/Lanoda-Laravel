
<a href="{{ url('/contacts', $contact->url_name) }}">
	<div class="contact-tile">
		<div class="contact-image-wrapper">
			@if ($contact->image != null)
				<img class="contact-image" src="{{ $contact->image->file_url }}" alt="contact-image-name">
			@else
				<i class="material-icons contact-icon">person</i>
			@endif
		</div>
		<div class="contact-name"><span>{{ $contact->firstname }}</span> <span>{{ $contact->lastname }}</span></div>
	</div>
</a>
