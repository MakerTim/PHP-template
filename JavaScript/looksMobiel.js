var f;

$(function() {
	function toggleMenu() {
		t = 750;
		$(".ulSidebar").toggleClass("isOpen");
		if($(".ulSidebar").hasClass("isOpen")) {
			j = 0; mp = 1;
		} else {
			j = t; mp = -1;
			
		}
		for(i = 0; i < t; i++) {
			setTimeout(function() {
				j += mp;
				$(".ulSidebar").height((window.innerHeight - $(".ulSidebar").position().top) * (j / t));
				nw = Math.max((($(".sidebar").width()) * (j / t)), 50);
				$('.MenuButton').css("width", nw);
				$('.ulSidebar').css("width", nw);
				if(j == 0) { 
					$(".ulSidebar").hide();
				} else if(j == 1) {
					$(".ulSidebar").show();
				}
			}, i);
		}
		updateResize();
	}
	$('.MenuButton').click(toggleMenu);
});

function toggleMobiel(enabled){
	if(enabled) {
		$('.ulSidebar').hide();
		$('.sidebar').css("margin-left",  "-" + $('body').css("margin"));
		$('.sidebar').css("margin-top",  "-" + $('body').css("margin"));
		$('.sidebar').css("top",  "8px");
		$('.MenuButton').css("width",  "50px");
	} else {
		$('.ulSidebar').show();
		$('.sidebar').css("margin-left",  "auto");
		$('.sidebar').css("margin-top",  "auto");
		$('.sidebar').css("top",  "auto");
		$(".ulSidebar").removeClass("isOpen");
		$('.ulSidebar').css("width",  "auto");
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
	resizeSidebarMobiel(width, height);
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
			$(".sidebar").attr("style", $(".sidebar").attr("style").replace(/height:.{0,}?;/i, ""));
		}
		if(r){
			updateResize();
		}
	}
}

function resizeBannerMobiel(width, height) {
	canvas = $("#Banner").get(0);
	g2d = canvas.getContext("2d");
	img = $("#BannerSrc").get(0);
	
	ht = 130, st = 640, ms = 1920;
	vw = width;
	nvw = Math.min((width), ms) - 20;
	
	canvas.height = ht;
	canvas.width  = nvw;
	
	g2d.drawImage(img, st, 0, mob, ht, 0, 0, nvw, ht);
}

function resizeMenuMobiel(width, height) {
	$(".Menu").width(width - 20);
}

function resizeContentMobiel(width, height) {
	$(".Content").width(width - 20);
	$(".Content").css("margin-bottom", $(".Footer").height() + 35);
}

function resizeFooterMobiel(width, height) {
	$(".Footer").width(width - 20);
}

function resizeSidebarMobiel(width, height) {
	$(".MenuButton img").show();
	if($('.MenuButton').hasClass("open")) {
		$(".sidebar").width(width / 2);
	} else {
		$(".sidebar").attr("style", $(".sidebar").attr("style").replace(/width:.{0,}?;/i, ""));
	}
	$(".ulSidebar").height(height - $(".ulSidebar").position().top);
}