
@section('modal')
	<div id="createNoteModal" class="modal">
		<h4 class="heading">CREATE NEW $noteType</h4>
		<div class="lanoda-form-card">
			<form id="createNoteForm">
				<div class="text-center">
					<!-- Simple Textfield -->
					{!! csrf_field() !!}

					<div class="mdl-grid">
						<!-- ContactId -->
						<input type="hidden" name="contact_id" id="note-contact_id" value="{{ $contact->id }}" />

						<div class="mdl-cell mdl-cell--1-col">
							<div class="lanoda-textfield">
								<!-- <input type="hidden" name="type_id" id="noteTypeId" value="0" /> -->
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

						<!-- Title -->
						<div class="mdl-cell mdl-cell--12-col">
							<div class="lanoda-textfield">
								<input class="mdl-textfield__input" type="text" name="title" id="note-title" data-placeholder="* Title" placeholder="* Title" />
							</div>
						</div>

						<div class="mdl-cell mdl-cell--12-col">
							<div class="laonda-textfield">
								<textarea class="mdl-textfield__input" type="text" rows= "3" name="body" id="note-body" data-placeholder="* Content" placeholder="* Content"></textarea>
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
@stop
