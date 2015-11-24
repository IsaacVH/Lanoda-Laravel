
<a href="{{ url('/contacts', $contact->url_name) }}">
	<div class="contact-tile">
		<div class="contact-image-wrapper" style="overflow: hidden;">
			@if ($contact->image != null)
				<img style="height: 100%; width: auto;" class="contact-image" src="{{ $contact->image->url }}" alt="contact-image-name">
			@else
				<i class="material-icons contact-icon">person</i>
			@endif
		</div>
		<div class="contact-name"><span>{{ $contact->firstname }}</span> <span>{{ $contact->lastname }}</span></div>
	</div>
</a>
