var f;

function loadLooksMobiel() {
	if(PHP.page.hasSideBar){
		$('.MenuButton').click(toggleSideBar);
	}
	$('.menuImg').click(toggleMenu);
	
	$('.menuItem').click(innerLink);
};

function toggleSideBar() {
	$(".ulSidebar").toggleClass("isOpen");
	if($(".ulSidebar").hasClass("isOpen")) {
		$(".sidebar").attr("style", $(".sidebar").attr("style").replace(/width:.{0,}?;/i, ""));
		$(".ulSidebar").show().animate({
			height : (window.innerHeight - $(".ulSidebar").position().top),
			width : $(".sidebar").width(),
		}, 300);
		$('.MenuButton').animate({
			width : $(".sidebar").width(),
		}, 300);
	} else {
		$(".sidebar").attr("style", $(".sidebar").attr("style").replace(/width:.{0,}?;/i, ""));
		$(".ulSidebar").animate({
			height : "0px",
			width : "0px",
		}, 300, function() {
			$(".ulSidebar").hide();
		});
		$('.MenuButton').animate({
			width : 50,
		}, 300);
	}
	updateResize();
}

function toggleMenu() {
	$(".menuImg").toggleClass("isOpen");
	if($(".menuImg").hasClass("isOpen")) {
		$(".menuItem").css("display", "list-item");
	} else {
		$(".menuItem:not(.menuSelected)").hide();
	}
}

function innerLink() {
	$(this).children().each(function(key, value) {
		j = $(value);
		if(j.attr("href") !== undefined) {
			window.location.href = $(value).attr("href");
		} else if(j.hasClass("menuImg")) {
			j.click();
		}
	});
}

function toggleMobiel(enabled){
	if(enabled) {
		if(PHP.page.hasSideBar){
			$('.ulSidebar').hide();
			$(".ulSidebar").css("height", "0px");
			$('.sidebar').css("margin-left",  "-" + $('body').css("margin"));
			$('.sidebar').css("margin-top",  "-" + $('body').css("margin"));
			$('.sidebar').css("top",  "8px");
			$('.MenuButton').css("width",  "50px");
		}
		$('.sidebar').css("height",  "auto");
		$(".menuImg").show();
		$(".menuItem:not(.menuSelected)").hide();
		$(".menuSelected").css("display", "list-item");
	} else {
		if(PHP.page.hasSideBar){
			$('.ulSidebar').show();
			$(".ulSidebar").attr("style", $(".ulSidebar").attr("style").replace(/height:.{0,}?;/i, ""));
			$('.sidebar').css("margin-left",  "auto");
			$('.sidebar').css("margin-top",  "auto");
			$('.sidebar').css("top",  "auto");
			$(".ulSidebar").removeClass("isOpen");
			$('.MenuButton').css("width",  "auto");
			$('.ulSidebar').css("width",  "auto");
		}
		$(".menuImg").hide();
		$(".menuItem").css("display", "inline");
	}
}

function resizeMobiel(width, height) {
	if(d) {
		console.log(width, height);
	}
	if(f == undefined){
		f = 0;
		toggleMobiel(true);
	}
	$("#Pagina").width(width);
	resizeBannerMobiel(width, height);
	resizeMenuMobiel(width, height);
	resizeContentMobiel(width, height);
	resizeFooterMobiel(width, height);
	if(PHP.page.hasSideBar){
		resizeSidebarMobiel(width, height);
	}
}

function setMob(bool, r) {
	if(isMob != bool){
		isMob = bool;
		toggleMobiel(isMob);
		pagina = $("#Pagina");
		if(bool) {
			pagina.removeClass("Pagina");
			pagina.addClass("Mobiel");
		} else {
			pagina.removeClass("Mobiel");
			pagina.addClass("Pagina");
			if(PHP.page.hasSideBar){
				$(".sidebar").attr("style", $(".sidebar").attr("style").replace(/height:.{0,}?;/i, ""));
			}
		}
		if(r){
			updateResize();
		}
	}
}

function resizeBannerMobiel(width, height) {
	canvas = $("#Banner").get(0);
	if(canvas == undefined){
		return;
	}
	g2d = canvas.getContext("2d");
	img = $("#BannerSrc").get(0);
	
	ht = 130, st = 640, ms = 1920;
	vw = width;
	nvw = Math.min((width), ms) - 20;
	
	canvas.height = ht;
	canvas.width  = nvw;
	
	g2d.drawImage(img, st, 0, mob, ht, 0, 0, nvw, ht);
	
	$(".SocialMedia").css("top", "auto").css("right", "auto");
}

function resizeMenuMobiel(width, height) {
	$(".Menu").width(width - 20);
}

function resizeContentMobiel(width, height) {
	$(".Content").width(width - 20);
	$(".Content").css("margin-bottom", $(".Footer").height() + 35);
	$(".ContentButtons").css("margin-left", width - $(".ContentButtons").width() - 35);
}

function resizeFooterMobiel(width, height) {
	$(".Footer").width(width - 20);
}

function resizeSidebarMobiel(width, height) {
	$(".MenuButton img").show();
	if($('.MenuButton').hasClass("open")) {
		$(".sidebar").width(width / 2);
	} else {
		$(".sidebar").css("width", "auto");
	}
	try {
		$(".ulSidebar").height(height - $(".ulSidebar").position().top);
	}catch(ex){ }
}