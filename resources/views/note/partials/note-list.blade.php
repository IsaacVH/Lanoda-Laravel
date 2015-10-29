
<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell loading-cell lanoda-hide">
	<div class="spinner-wrapper">
		<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner"></div>
	</div>
</div>

@foreach ($contact->notes as $note)
	<?php 
		$noteTypeIds = ["General" => 1, "LikeDislike" => 2, "Memory" => 3, "Reminder" => 4, "Photo" => 5];
		$noteClass = '';
		switch($note->type_id) {
			case $noteTypeIds["General"]:
				$noteClass = 'note-general';
				break;
			case $noteTypeIds["LikeDislike"]:
				$noteClass = 'note-likedislike';
				break;
			case $noteTypeIds["Memory"]:
				$noteClass = 'note-memory';
				break;
			case $noteTypeIds["Reminder"]:
				$noteClass = 'note-reminder';
				break;
			case $noteTypeIds["Photo"]:
				$noteClass = 'note-photo';
				break;
		}

		$noteType = $noteTypes[$note->type_id - 1];
	?>
	@include('note.partials.note-tile', compact($contact, $note, $noteClass, $noteType))

@endforeach

