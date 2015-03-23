$(function() {
	if($.cookie('cookies') == undefined) {
		$('.CookiePopup').show();
	}else{
		$('.CookiePopup').hide();
	}
	
	
	$(".CookiePopup #accept").click(function(t) {
		$.cookie('cookies', true);
		$('.CookiePopup').animate({ opacity: 0 }, 1500);
	});

	$(".CookiePopup #policy").click(function(t) {
		location.href = "../Policy/";
	});
});