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


