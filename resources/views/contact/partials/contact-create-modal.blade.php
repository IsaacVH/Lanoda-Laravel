
<div id="createContactModal" class="modal">
	<div class="mdl-card mdl-shadow--2dp lanoda-form-card">
		<div class="mdl-card--border">
			<!-- Simple Textfield -->
			<form id="createContactForm" method="POST" action="javascript:submitContactForm()">
				{!! csrf_field() !!}
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="firstname" id="contact-firstname" />
					<label class="mdl-textfield__label" for="contact-firstname">First Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="middlename" id="contact-middlename" />
					<label class="mdl-textfield__label" for="contact-middlename">Middle Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="lastname" id="contact-lastname" />
					<label class="mdl-textfield__label" for="contact-lastname">Last Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="email" id="contact-email" />
					<label class="mdl-textfield__label" for="contact-email">Email</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="address" id="contact-address" />
					<label class="mdl-textfield__label" for="contact-address">Address</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="birthday" id="contact-birthday" />
					<label class="mdl-textfield__label" for="contact-birthday">Birthday</label>
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
