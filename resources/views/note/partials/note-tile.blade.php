
<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--6-col-phone note-list-cell {{ $noteClass }}">
	<a class="normalize-link" href="/contacts/{{ $contact->url_name }}/notes/{{ $note->id }}">
		<div class="note-tile" style="padding: 15px;">
			<div>
				<div class="note-icon inline-block align-vertical-middle" style="margin-right: 15px;"><i class="material-icons">{{ $noteType->icon }}</i></div>
				<div class="note-title inline-block align-vertical-middle">{{ $note->title }}</div>
			</div>
			<div class="note-body" style="padding: 15px 0;">{{ $note->body }}</div>
		</div>
	</a>
</div>

