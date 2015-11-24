
@section('modal')
	<div id="createContactModal" class="modal">
		<h4 class="heading">CREATE NEW CONTACT</h4>
		<div class="lanoda-form-card">
			<form id="createContactForm">
				<div class="text-center">
					<!-- Simple Textfield -->
					{!! csrf_field() !!}

					<div class="mdl-grid">

						<!-- Name (First, Middle, Last) -->
						<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet">
							<div class="lanoda-textfield">
								<input type="text" name="firstname" id="contact-firstname" data-placeholder="* First Name" placeholder="* First Name" required />
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet">
							<div class="lanoda-textfield">
								<input type="text" name="middlename" id="contact-middlename" data-placeholder="Middle Name" placeholder="Middle Name" />
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet">
							<div class="lanoda-textfield">
								<input type="text" name="lastname" id="contact-lastname" data-placeholder="Last Name" placeholder="Last Name" />
							</div>
						</div>

						<!-- Phone# and Email -->
						<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
							<div class="lanoda-textfield">
								<input type="phone" name="phone" id="contact-phone" data-placeholder="Phone Name" placeholder="Phone Number" />
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
							<div class="lanoda-textfield">
								<input type="email" name="email" id="contact-email" data-placeholder="Email" placeholder="Email" />
							</div>
						</div>

						<!-- Address -->
						<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet">
							<div class="lanoda-textfield">
								<input type="text" name="address" id="contact-address" data-placeholder="Address" placeholder="Address" />
							</div>
						</div>

						<!-- Age and Birthdate -->
						<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
							<div class="lanoda-number">
								<input type="number" name="age" id="contact-age" data-placeholder="Age" placeholder="Age" />
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
							<div class="lanoda-datepicker">
								<input type="date" name="birthday" id="contact-birthday" data-placeholder="Birthday" placeholder="Birthday" />
							</div>
						</div>

						<!-- Relation -->
						<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet text-left">
							<h5>Relation:</h5>
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet lanoda-checkbox">
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
										<input class="mdl-checkbox__input" type="checkbox" name="relations[]" value="false" id="contact-type--friend" />
										<span for="contact-type--friend" class="mdl-checkbox__label noselect">Friend</span>
									</label>
								</div>
								<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet lanoda-checkbox">
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
										<input class="mdl-checkbox__input" type="checkbox" name="relations[]" value="false" id="contact-type--family" />
										<span for="contact-type--family" class="mdl-checkbox__label noselect">Family</span>
									</label>
								</div>
								<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet lanoda-checkbox">
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
										<input class="mdl-checkbox__input" type="checkbox" name="relations[]" value="false" id="contact-type--work" />
										<span for="contact-type--work" class="mdl-checkbox__label noselect">Work</span>
									</label>
								</div>
								<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet lanoda-checkbox">
									<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
										<input class="mdl-checkbox__input" type="checkbox" name="relations[]" value="false" id="contact-type--school" />
										<span for="contact-type--school" class="mdl-checkbox__label noselect">School</span>
									</label>
								</div>
							</div>
						</div>

						<!-- picture -->
						<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet text-left">
							<h5>Photo Upload</h5>
							<input id="contact-image" name="image" type="file" class="uploader" for="display-image" />
							<div id="display-image" class="display-image drop-location" for="contact-image">
								<img src="" />
								<div class="cover-image"></div>
								<button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect" for="contact-image" onclick="$('#contact-image').trigger('click');">
									<span class="camera-icon"><i class="material-icons md-36 align-vertical-middle">camera_alt</i></span>
									<span class="upload-icon"><i class="material-icons md-36 align-vertical-middle">file_upload</i></span>
								</button>
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
@stop
