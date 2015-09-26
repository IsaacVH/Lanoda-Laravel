
<div id="createNoteModal" class="modal">
	<div class="mdl-card mdl-shadow--2dp lanoda-form-card">
		<form id="createNoteForm" method="POST" action="return notes.submitCreateForm()">
			<div class="mdl-card--border text-center">
				<!-- Simple Textfield -->
				{!! csrf_field() !!}
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" name="title" id="note-title" />
					<label class="mdl-textfield__label" for="note-title">Title</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<!-- Floating Multiline Textfield -->
					<div class="mdl-textfield mdl-js-textfield">
						<textarea class="mdl-textfield__input" type="text" rows= "3" name="body" id="note-body" ></textarea>
						<label class="mdl-textfield__label" for="note-body">Content...</label>
					</div>
				</div>
			</div>
			<div class="mdl-card__actions mdl-card--border">
				<button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored lanoda-right">
					Create
				</button>
				<button type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect lanoda-left close-modal">
					Cancel
				</button>
			</div>
		</form>
	</div>
</div>

