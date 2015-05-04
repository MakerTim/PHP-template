function loadCookies() {
	if($.cookie('AcceptCookie') == undefined) {
		$('.CookiePopup').show();
	}else{
		$('.CookiePopup').hide();
		$.cookie('AcceptCookie', true, { expires: 28, path: '/' });
	}
	
	
	$(".CookiePopup #accept").click(function(t) {
		$.cookie('AcceptCookie', true, { expires: 28, path: '/' });
		$('.CookiePopup').hide(1500);
	});

	$(".CookiePopup #policy").click(function(t) {
		location.href = "../Policy/";
	});
};
