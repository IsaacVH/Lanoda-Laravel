
<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell loading-cell lanoda-hide">
	<div class="spinner-wrapper">
		<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner"></div>
	</div>
</div>

@foreach ($contact->notes as $note)
	<?php 
		$noteClass = '';
		switch($note->type_id) {
			case $noteTypeIdFriend:
				$noteClass = 'note-friend';
				break;
			case $noteTypeIdFamily:
				$noteClass = 'note-family';
				break;
			case $noteTypeIdWork:
				$noteClass = 'note-work';
				break;
			case $noteTypeIdSchool:
				$noteClass = 'note-school';
				break;
		}

	?>

	<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--6-col-phone note-list-cell {{ $noteClass }}">
		<i classs="material-icons"></i>
		<div>{{ $note->title }}</div>
		<div>{{ $note->body }}</div>
	</div>
@endforeach

