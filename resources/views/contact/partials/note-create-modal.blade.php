
<div id="createNoteModal" class="modal">
	<div class="mdl-card mdl-shadow--2dp lanoda-form-card">
		<form id="createNoteForm" method="POST" onsubmit="return notes.submitCreateForm();">
			<div class="mdl-card--border text-center">
				<!-- Simple Textfield -->
				{!! csrf_field() !!}
				<div id="noteTypeSelect" style="width: 100px; display: inline-block; text-align: left;">

					<label id="noteTypeSelectorIcon">
						<input id="note-type_id" name="type_id" type="hidden" value="0" />
						<button id="noteTypeSelectorIcon" type="button" class="mdl-button mdl-js-button">
							<i class="material-icons">bug_report</i>
							<i class="material-icons">keyboard_arrow_down</i>
						</button>
					</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 300px; min-width: 0;">
					<input type="hidden" name="contact_id" id="note-contact_id" value="{{ $contact->id }}" />
					<input class="mdl-textfield__input" type="text" name="title" id="note-title" />
					<label class="mdl-textfield__label" for="note-title">Title</label>
				</div>
				<div style="height: 36px;">
					<div style="display: inline-block; min-width: 300px; width: 400px; display: inline-block; height: 100%; padding: 5px; border-radius: 3px; background-color: lightgray;">
					 	@foreach($noteTypes as $noteType)
					 		<div class="lanoda-left text-center" style="width: {{ (100 / sizeof($noteTypes)) }}%;">
								<button type="button" class="mdl-button mdl-js-button {{ $noteType->name }}" 
									    onclick="$('#note-type_id').attr('value', {{ $noteType->id }});">
									<i class="material-icons">bug_report</i>
								</button>
							</div>
						@endforeach
					</div>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<!-- Floating Multiline Textfield -->
					<div class="mdl-textfield mdl-js-textfield" style="width: 400px;">
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

