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
