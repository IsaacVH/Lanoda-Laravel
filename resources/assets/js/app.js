$(function() {
	$('.open-modal').on('click', function(event) {
		var modal = $(event.target).closest('.open-modal').data("modal");
		$("#"+modal).addClass('show');
		$(".mdl-layout").addClass("modal-open");
	});

	$(".background-shadow").on('click', closeModal);
});

function closeModal() {
	$(".mdl-layout").removeClass("modal-open");
	$(".modal").removeClass('show');
}

function createContact(data, handleCreateContactSuccess, handleCreateContactError) {
	$.ajax({
		"url": "/contacts",
		"type": "POST",
		"data": data,
		success: handleCreateContactSuccess,
		error: handleCreateContactError
	});
}


