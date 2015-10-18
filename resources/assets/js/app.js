$(function() {
	app.init();
	contacts.init();
	notes.init();
});

var app = {

	init: function () {
		$('.open-modal').on('click', function(event) {
			var modal = $(event.target).closest('.open-modal').data("modal");
			$("#"+modal).addClass('show');
			$("#"+modal).find('.close-modal').on('click', app.closeModal);
			$(".mdl-layout").addClass("modal-open");
		});

		
		var hiddenMenu = $('.hidden-menu');
		$('#'+hiddenMenu.attr('for')).on('click', function(event) {
			hiddenMenu.toggleClass('show');
		});

		$(".background-shadow").on('click', app.closeModal);
		$(".lanoda-expandlist-button").on('click', app.expandList);
	},

	closeModal: function() {
		$(".mdl-layout").removeClass("modal-open");
		$(".modal").removeClass('show');
	},

	expandList: function() {
		$('.lanoda-expandlist[for=\''+$(this).attr('id')+'\']').toggleClass('expanded');
		$(this).find(".down-arrow").toggleClass("lanoda-hide");
		$(this).find(".up-arrow").toggleClass("lanoda-hide");
	},

	contacts: {
		CreateContact: function(data, handleCreateContactSuccess, handleCreateContactError) {
			$.ajax({
				"url": "/api/contacts",
				"type": "POST",
				"data": data,
				success: handleCreateContactSuccess,
				error: handleCreateContactError
			});
		},

		GetContact: function(contactId, handleGetContactSuccess, handleGetContactFailure) {
			$.ajax({
				"url": "/api/contacts/" + contactId,
				"type": "GET",
				"data": data,
				success: handleGetContactSuccess,
				error: handleGetContactFailure
			});
		},

		GetContacts: function(data, handleGetContactsSuccess, handleGetContactsFailure) {
			$.ajax({
				"url": "/api/contacts",
				"type": "GET",
				"data": data,
				success: handleGetContactSuccess,
				error: handleGetCotnactSuccess
			});
		},

		UpdateContact: function(contactId, data, handleUpdateContactSuccess, handleUpdateContactFailure) {
			$.ajax({
				"url": "/api/contacts/" + contactId,
				"type": "PUT",
				success: handleUpdateContactSuccess,
				error: handleUpdateContactFailure
			});
		},

		DeleteContact: function(handleCreateDeleteSuccess, handleCreateDeleteError) {
			$.ajax({
				"url": "/api/contacts",
				"type": "DELETE",
				success: handleDeleteContactSuccess,
				error: handleDeleteContactError
			});
		},
	},

	notes: {
		CreateNote: function(data, handleCreateNoteSuccess, handleCreateNoteError) {
			$.ajax({
				"url": "/api/notes",
				"type": "POST",
				"data": data,
				success: handleCreateNoteSuccess,
				error: handleCreateNoteError
			});
		},

		GetNote: function(noteId, handleGetNoteSuccess, handleGetNoteFailure) {
			$.ajax({
				"url": "/api/notes/" + noteId,
				"type": "GET",
				"data": data,
				success: handleGetNoteSuccess,
				error: handleGetNoteFailure
			});
		},

		GetNotes: function(data, handleGetNotesSuccess, handleGetNotesFailure) {
			$.ajax({
				"url": "/api/notes",
				"type": "GET",
				"data": data,
				success: handleGetNoteSuccess,
				error: handleGetCotnactSuccess
			});
		},

		UpdateNote: function(noteId, data, handleUpdateNoteSuccess, handleUpdateNoteFailure) {
			$.ajax({
				"url": "/api/notes/" + noteId,
				"type": "PUT",
				success: handleUpdateNoteSuccess,
				error: handleUpdateNoteFailure
			});
		},

		DeleteNote: function(handleCreateDeleteSuccess, handleCreateDeleteError) {
			$.ajax({
				"url": "/api/notes",
				"type": "DELETE",
				success: handleDeleteNoteSuccess,
				error: handleDeleteNoteError
			});
		},
	}
}


