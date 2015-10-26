
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


//# sourceMappingURL=contact.js.map