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
		$(".background-shadow .click-wrapper").on('click', app.closeModal);

		$(".lanoda-expandlist-button").on('click', app.expandList);
		$(".lanoda-textfield input").on('focus', function(){ this.placeholder = ''; });
		$(".lanoda-textfield input").on('blur', function(){ this.placeholder = $(this).data('placeholder'); });

		$(".sort-type").on('click', app.selectSort);

		$(".drop-location").on('dragover', app.dragOver);
		$(".drop-location").on('dragleave', app.dragLeave);

		$(".hover-tooltip").on('mouseover', app.showTooltip);
		$(".hover-tooltip").on('mouseleave', app.hideTooltip);
	},

	openModal: function(event) {
		var modal = $(event.target).closest('.open-modal').data("modal");
		$("#"+modal).addClass('show');
		$("#"+modal).find('.close-modal').on('click', app.closeModal);

		$(".mdl-layout").addClass("modal-open");
		$(".background-shadow").addClass("show");
	},

	closeModal: function() {
		$(".mdl-layout").removeClass("modal-open");
		$(".modal").removeClass('show');
		$(".background-shadow").removeClass("show");
	},

	dragOver: function(event) {
		event.preventDefault();
		event.stopPropagation();
		$(this).addClass('dragenter');
	},

	dragLeave: function(event) {
		event.preventDefault();
		event.stopPropagation();
		$(this).removeClass('dragenter');
	},

	selectSort: function() {
		$(this).parent().find("[class*='-tab']").removeClass('selected');
		$(this).find('.noteType-tab').addClass('selected');
	},

	toggleHiddenMenu: function() {
		$('.hidden-menu[for="' + $(this).attr('id') + '"]').toggleClass('show');
	},

	expandList: function() {
		$('.lanoda-expandlist[for=\''+$(this).attr('id')+'\']').toggleClass('expanded');
		$(this).find(".down-arrow").toggleClass("lanoda-hide");
		$(this).find(".up-arrow").toggleClass("lanoda-hide");
	},

	showTooltip: function() {
		var tooltipId = $(this).attr('data-tooltip');
		var position = $(this).offset();
		var tooltip = $("#"+tooltipId);
		$(tooltip).addClass('show');
		$(tooltip).css('top', (position.top - $(tooltip).height()) + "px");
		$(tooltip).css('left', (position.left - $(tooltip).width()) + "px");
	},

	hideTooltip: function() {
		var tooltipId = $(this).attr('data-tooltip');
		$("#"+tooltipId).removeClass('show');
		$("#"+tooltipId).css('top', 'auto');
		$("#"+tooltipId).css('left', 'auto');
	},

	contacts: {
		CreateContact: function(data, handleCreateContactSuccess, handleCreateContactError) {
			$.ajax({
				"url": "/api/contacts",
				"type": "POST",
				"data": data,
				processData: false,
				contentType: false,
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
		$(".uploader").on('change', contacts.handleImageUpload);

		$(".drop-location").on('drop', contacts.imageDrop);

		$("#createContactForm").on('submit', contacts.submitCreateForm);
	},

	onClickDelete: function () {
		app.deleteContact(contacts.onDelete.Success, contacts.onDelete.Failure);
	},

	submitCreateForm: function(e) {
		e.preventDefault();
		var formData = new FormData(document.getElementById("createContactForm"));		
		var contactForm = contacts.validateContactForm(formData);
		if (contactForm.IsValid) {
			$(".contact-list .loading-cell").removeClass("lanoda-hide");
			var createContactValue = app.contacts.CreateContact(formData, contacts.onCreate.Success, contacts.onCreate.Failure);
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

	imageDrop: function(evt) {
		evt.preventDefault();
    	evt.stopPropagation();
    	var inputId = $(this).attr('for');
    	document.getElementById(inputId).files = evt.originalEvent.dataTransfer.files
		$(this).trigger('dragleave');
	},

	handleImageUpload: function(evt) {
		// Check for the various File API support.
		if (window.File && window.FileReader && window.FileList && window.Blob) {
		  // Great success! All the File APIs are supported.
		} else {
		  alert('The File APIs are not fully supported in this browser.');
		}

		var files = evt.target.files; // FileList object
		var imageFile = null;
		
		// files is a FileList of File objects. List some properties.
		if (files != null && files.length > 0) {
			imageFile = files[0];
		}

		contacts.addImagePreview(this, imageFile);
	},

	addImagePreview: function(elem, imageFile) {
		var imageDisplayId = $(elem).attr('for');
		
		var reader = new FileReader();
		reader.onloadend = function () {
			$('#'+imageDisplayId+' img').attr('src', reader.result);
			$('#'+imageDisplayId).addClass('has-image');
		};

		if (imageFile) {
		  reader.readAsDataURL(imageFile);
		} else {
		  $(imageDisplay).css('background-image', '');
		}
	},

	onCreate: {
		Success: function (data) {
			$(".contact-list .loading-cell").addClass("lanoda-hide");

			var newContact = $('<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell new-contact"></div>').html(data);

			$(".contact-list .loading-cell").after(newContact);
			$(".contact-list .new-contact").removeClass("new-contact");

			$('body').append('<div class="messages"></div>').html(data);
			console.log(data);
		},

		Failure: function (data) {
			//alert($(data).find('.exception_message'));
			console.log(data);
			alert($($.parseHTML(data['responseText'])).find('.exception_message').text());
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
		$('#createNotForm').on('submit', notes.submitCreateForm);
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