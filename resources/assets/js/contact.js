function submitContactForm() {
	var data = $("#createContactForm").serialize();
	createContact(data, contactCreateSuccess, contactCreateFailure);
	$(".contact-list .loading-cell").removeClass("lanoda-hide");
	closeModal();
}

function contactCreateSuccess(data) {
	$(".contact-list .loading-cell").addClass("lanoda-hide");
	var newContact = $('<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--6-col-phone contact-list-cell new-contact"></div>').html(data);
	$(".contact-list .loading-cell").after(newContact);
	$(".contact-list .new-contact").removeClass("new-contact");
}

function contactCreateFailure(data) {
	alert("Could not create contact!");
	console.log(data);
}

