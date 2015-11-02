
<div id="createContactModal" class="modal">
	<h4 class="heading">CREATE NEW CONTACT</h4>
	<div class="lanoda-form-card">
		<form id="createContactForm" onsubmit="return contacts.submitCreateForm()">
			<div class="text-center">
				<!-- Simple Textfield -->
				{!! csrf_field() !!}

				<div class="mdl-grid">

					<div class="mdl-cell mdl-cell--4-col">
						<div class="lanoda-textfield">
							<input type="text" name="firstname" id="contact-firstname" data-placeholder="* First Name" placeholder="* First Name" required />
						</div>
					</div>
					<div class="mdl-cell mdl-cell--4-col">
						<div class="lanoda-textfield">
							<input type="text" name="middlename" id="contact-middlename" data-placeholder="* Middle Name" placeholder="* Middle Name" />
						</div>
					</div>
					<div class="mdl-cell mdl-cell--4-col">
						<div class="lanoda-textfield">
							<input type="text" name="lastname" id="contact-lastname" data-placeholder="* Last Name" placeholder="* Last Name" />
						</div>
					</div>

					<div class="mdl-cell mdl-cell--6-col">
						<div class="lanoda-textfield">
							<input type="phone" name="phone" id="contact-phone" data-placeholder="* Phone Name" placeholder="* Phone Number" />
						</div>
					</div>
					<div class="mdl-cell mdl-cell--6-col">
						<div class="lanoda-textfield">
							<input type="email" name="email" id="contact-email" data-placeholder="* Email" placeholder="* Email" />
						</div>
					</div>

					<div class="mdl-cell mdl-cell--12-col">
						<div class="lanoda-textfield">
							<input type="text" name="address" id="contact-address" data-placeholder="* Address" placeholder="* Address" />
						</div>
					</div>

					<div class="mdl-cell mdl-cell--6-col">
						<div class="lanoda-number">
							<input type="number" name="age" id="contact-age" data-placeholder="Age" placeholder="Age" />
						</div>
					</div>
					<div class="mdl-cell mdl-cell--6-col">
						<div class="lanoda-datepicker">
							<input type="date" name="birthday" id="contact-birthday" data-placeholder="Birthday" placeholder="* Birthday" />
						</div>
					</div>
				</div>
			</div>
			<div class="control-area">
				<button type="submit" class="submit mdl-button mdl-js-button mdl-js-ripple-effect">
					Next
				</button>
				<button type="button" class="cancel mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored close-modal">
					Cancel
				</button>
			</div>
		</form>
	</div>
</div>
