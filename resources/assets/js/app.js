$(function() {
	var modalTrigger = $('.modal').attr('for');
	$('#'+modalTrigger).on('click', function() {
		$(".modal[for='"+modalTrigger+"']").addClass('show');
		$(".mdl-layout").addClass("modal-open");
	});

	$(".background-shadow").on('click', closeModal);
});

function closeModal() {
	$(".mdl-layout").removeClass("modal-open");
	$(".modal").removeClass('show');
}

