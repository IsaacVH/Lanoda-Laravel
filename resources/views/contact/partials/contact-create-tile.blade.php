
<div id="createContact" class="contact-tile create-contact open-modal" data-modal="createContactModal">
	<div class="contact-image-wrapper">
		<i class="material-icons contact-icon">person</i>
	</div>
	<div class="contact-plus-wrapper">
		<button id="contact-plus-button" class="contact-plus mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored open-modal" data-modal="createContactModal">
			<i class="material-icons">add</i>
		</button>
		<div for="contact-plus-button" class="mdl-tooltip mdl-tooltip--large">
			Add New Contact
		</div>
	</div>
</div>

@include('contact.partials.contact-create-modal')
