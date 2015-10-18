
<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell loading-cell lanoda-hide">
	<div class="spinner-wrapper">
		<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner"></div>
	</div>
</div>

@foreach ($contact->notes as $note)
	<?php 
		$noteClass = '';
		switch($note->type_id) {
			case $noteTypeIdGeneral:
				$noteClass = 'note-general';
				break;
			case $noteTypeIdLikeDislike:
				$noteClass = 'note-likedislike';
				break;
			case $noteTypeIdMemory:
				$noteClass = 'note-memory';
				break;
			case $noteTypeIdReminder:
				$noteClass = 'note-reminder';
				break;
			case $noteTypeIdPhoto:
				$noteClass = 'note-photo';
				break;
		}

		$noteType = $noteTypes[$note->type_id - 1];
	?>
	@include('note.partials.note-tile', compact($contact, $note, $noteClass, $noteType))

@endforeach

