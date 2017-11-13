/*global $,location*/
$(document).ready(function() {
	setBind();

});

function setBind() {
	$('.cta').click(function(e) {
		e.preventDefault();
		var sectionID = e.currentTarget.id + "Section";

		$('body').animate({
			scrollTop: $('#submitSection').offset().top
		}, 3000);
	});
}

$('#myModal').on('hidden.bs.modal', function() {
	location.reload(true);
});
