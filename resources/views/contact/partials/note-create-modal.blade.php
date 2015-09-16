
<div id="createNoteModal" class="modal">
	<div class="mdl-card mdl-shadow--2dp lanoda-form-card">
		<form id="createNoteForm" method="POST" action="javascript:submitNoteCreate()">
			<div class="mdl-card--border">
				<!-- Simple Textfield -->
				{!! csrf_field() !!}
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="firstname" id="note-firstname" />
					<label class="mdl-textfield__label" for="note-firstname">First Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="middlename" id="note-middlename" />
					<label class="mdl-textfield__label" for="note-middlename">Middle Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="lastname" id="note-lastname" />
					<label class="mdl-textfield__label" for="note-lastname">Last Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="email" id="note-email" />
					<label class="mdl-textfield__label" for="note-email">Email</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="address" id="note-address" />
					<label class="mdl-textfield__label" for="note-address">Address</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" name="birthday" id="note-birthday" />
					<label class="mdl-textfield__label" for="note-birthday">Birthday</label>
				</div>
			</div>
			<div class="mdl-card__actions mdl-card--border">
				<button onclick="javascript:$('#createNoteForm').submit()" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored lanoda-right">
					Create
				</button>
				<button onclick="javascript:closeModal()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect lanoda-left">
					Cancel
				</button>
			</div>
		</form>
	</div>
</div>

