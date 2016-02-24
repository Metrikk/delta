$(document).ready(function() {
	$("body").addClass("loaded");

	$(function () {
		$('a[rel="lightbox"]').fluidbox();
	})
});

$(window).scroll(function() {
	if ($(this).scrollTop() > 1){
		$('.navbar').addClass("sticky");
	}
	else{
		$('.navbar').removeClass("sticky");
	}
});
