/***************** BEGIN APP.JS ********************/

$(function() {
	app.init();

	if(typeof contacts != 'undefined') {
		contacts.init();
	}

	if(typeof notes != 'undefined') {
		notes.init();
	}
});

var app = {

	init: function () {
		$('.open-modal').on('click', app.openModal);
		$('#' + $('.hidden-menu').attr('for')).on('click', app.toggleHiddenMenu);
		$(".background-shadow").on('click', app.closeModal);

		$(".lanoda-expandlist-button").on('click', app.expandList);
		$(".lanoda-textfield input").on('focus', function(){ this.placeholder = ''; });
		$(".lanoda-textfield input").on('blur', function(){ this.placeholder = $(this).data('placeholder'); });
	},

	openModal: function(event) {
		var modal = $(event.target).closest('.open-modal').data("modal");
		$("#"+modal).addClass('show');
		$("#"+modal).find('.close-modal').on('click', app.closeModal);
		$(".mdl-layout").addClass("modal-open");
	},

	closeModal: function() {
		$(".mdl-layout").removeClass("modal-open");
		$(".modal").removeClass('show');
	},

	toggleHiddenMenu: function() {
		$('.hidden-menu[for="' + $(this).attr('id') + '"]').toggleClass('show');
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
	},

	tags: {
		CreateTag: function(data, handleCreateNoteSuccess, handleCreateNoteError) {
			$.ajax({
				"url": "/api/tags",
				"type": "POST",
				"data": data,
				success: handleCreateNoteSuccess,
				error: handleDeleteNoteError
			});
		},

		GetTag: function(tagId, handleGetTagSuccess, handleGetTagError) {
			$.ajax({
				"url": "/api/tags/" + tagId,
				"type": "GET",
				success: handleGetTagSuccess,
				error: handleGetTagError
			});
		},

		GetTags: function(data, handleGetTagsSuccess, handleGetTagsError) {
			$.ajax({
				"url": "/api/tags",
				"type": "GET",
				"data": data,
				success: handleGetTagsSuccess,
				error: handleGetTagsError
			});
		},

		UpdateTag: function(tagId, data, handleUpdateTagSuccess, handleUpdateTagError) {
			$.ajax({
				"url": "/api/tags" + tagId,
				"type": "PUT",
				success: handleUpdateTagSuccess,
				error: handleUpdateTagError
			});
		},

		DeleteTag: function(tagId, handleDeleteTagSuccess, handleUpdateTagError) {
			$.ajax({
				"url": "/api/tags" + tagId,
				"type": "DELETE",
				success: handleDeleteTagSuccess,
				error: handleDeleteTagError
			});
		},
	}
}

/***************** END APP.JS **********************/

/***************** BEGIN CONTACT.JS ****************/

var contacts = {

	noteListFailure: "Note List Failed",

	init: function () {
		$(".close-drawer-button").on('click', function() { $('.mdl-layout__drawer').removeClass("is-visible"); });
	},

	onClickDelete: function () {
		app.deleteContact(contacts.onDelete.Success, contacts.onDelete.Failure);
	},

	submitCreateForm: function() {
		var data = $("#createContactForm").serialize();
		
		var contactForm = contacts.validateContactForm(data);
		if (contactForm.IsValid) {
			$(".contact-list .loading-cell").removeClass("lanoda-hide");
			app.contacts.CreateContact(data, contacts.onCreate.Success, contacts.onCreate.Failure);
			app.closeModal();
		} else {
			var errors = contactForm.Errors;
		}

		return false;
	},

	validateContactForm: function(data) {
		return {
			IsValid: true,
			Errors: []
		};
	},

	onCreate: {
		Success: function (data) {
			$(".contact-list .loading-cell").addClass("lanoda-hide");
			var newContact = $(
				'<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet ' +
				'mdl-cell--6-col-phone contact-list-cell new-contact"></div>'
			).html(data);
			$(".contact-list .loading-cell").after(newContact);
			$(".contact-list .new-contact").removeClass("new-contact");
		},

		Failure: function (data) {
			alert("Could not create contact!");
		},
	},

	onDelete: {
		Success: function (data) {
			window.location.href="/contacts";
		},

		Failure: function (data) {
			alert("Could not delete Contact");
		}
	}
};

/***************** END CONTACT.JS ******************/



/***************** BEGIN NOTE.JS ******************/

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

/***************** END NOTE.JS ********************/


//# sourceMappingURL=compiled.js.map