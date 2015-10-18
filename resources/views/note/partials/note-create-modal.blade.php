
<div id="createNoteModal" class="modal">
	<div class="mdl-card mdl-shadow--2dp lanoda-form-card">
		<h4 style="margin: 0; margin-left: 30px;">Create Note</h4>
		<form id="createNoteForm" method="POST" onsubmit="return notes.submitCreateForm();">
			<div class="mdl-card--border text-center">
				<!-- Simple Textfield -->
				{!! csrf_field() !!}

				<!-- ContactId -->
				<input type="hidden" name="contact_id" id="note-contact_id" value="{{ $contact->id }}" />

				<!-- TypeId -->
				<div class="mdl-grid" style="width: 450px;">
					<div class="mdl-cell mdl-cell--1-col" style="margin-left: 0; margin-right: 16px;">
						<div style="padding: 20px 0;">
							<input type="hidden" name="type_id" id="noteTypeId" value="0" />
							<button id="note-type-button" type="button" class="mdl-button mdl-js-button mdl-button--icon">
								<i class="material-icons text-darkgray">more_vert</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="note-type-button">
								@foreach($noteTypes as $noteType)
									<li class="mdl-menu__item note-select-type" data-type="{{ $noteType->id }}" data-icon="{{ $noteType->icon }}">
										<div class="menu-icon-wrapper">
											<i class="material-icons text-darkgray">{{ $noteType->icon }}</i>
										</div>
										<div class="align-vertical-middle inline-block">{{ $noteType->name }}</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--11-col">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" name="title" id="note-title" />
							<label class="mdl-textfield__label" for="note-title">Title</label>
						</div>
					</div>
				</div>

				<div class="mdl-grid" style="width: 450px;">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<!-- Floating Multiline Textfield -->
							<div class="mdl-textfield mdl-js-textfield">
								<textarea class="mdl-textfield__input" type="text" rows= "3" name="body" id="note-body" ></textarea>
								<label class="mdl-textfield__label" for="note-body">Content...</label>
							</div>
						</div>
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

