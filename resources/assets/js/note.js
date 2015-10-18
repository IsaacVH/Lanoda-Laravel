var notes = {

	init: function () {
		$('.note-select-type').on('click', notes.selectNoteType);
	},

	onClickDelete: function () {
		app.deleteNote(notes.onDelete.Success, notes.onDelete.Failure);
	},

	selectNoteType: function () {
		var typeText = $(this).data('type');
		var iconText = $(this).data('icon');
		$('#noteTypeId').attr('value', typeText);
		$('#note-type-button .default-text').addClass("lanoda-hide");
		$('#note-type-button .material-icons').html(iconText);
	},

	submitCreateForm: function() {
		var data = $("#createNoteForm").serialize();
		
		console.log(data);
		var noteForm = notes.validateNoteForm(data);
		if (noteForm.IsValid) {
			$(".note-list .loading-cell").removeClass("lanoda-hide");
			app.notes.CreateNote(data, notes.onCreate.Success, notes.onCreate.Failure);
			app.closeModal();
		} else {
			var errors = noteForm.Errors;
		}

		return false;
	},

	validateNoteForm: function(data) {
		return {
			IsValid: true,
			Errors: []
		};
	},

	onCreate: {
		Success: function (data) {
			$(".note-list .loading-cell").addClass("lanoda-hide");
			var newContact = $(
				'<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet ' +
				'mdl-cell--6-col-phone note-list-cell new-note"></div>'
			).html(data);
			$(".note-list .loading-cell").after(newContact);
			$(".note-list .new-note").removeClass("new-note");
		},

		Failure: function (data) {
			alert(data.statusText + ": Could not create note!");
			var opened = window.open("");
			opened.document.write(data.responseText);
		},
	},

	onDelete: {
		Success: function (data) {
			window.location.href="/contacts";
		},

		Failure: function (data) {
			alert(data.statusText + ": Could not delete Contact");
		}
	}
};