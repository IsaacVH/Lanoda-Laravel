$(function() {
	app.init();
});

var app = {

	init: function () {
		$('.open-modal').on('click', function(event) {
			var modal = $(event.target).closest('.open-modal').data("modal");
			$("#"+modal).addClass('show');
			$(".mdl-layout").addClass("modal-open");
		});

		
		var hiddenMenu = $('.hidden-menu');
		$('#'+hiddenMenu.attr('for')).on('click', function(event) {
			hiddenMenu.toggleClass('show');
		});

		$(".background-shadow").on('click', closeModal);
	},

	closeModal: function() {
		$(".mdl-layout").removeClass("modal-open");
		$(".modal").removeClass('show');
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
	}
}


