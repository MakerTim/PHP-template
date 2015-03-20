function resizeMobiel(width, height) {
	if(d) {
		console.log(width, height);
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
		pagina = $("#Pagina");
		if(bool) {
			pagina.removeClass("Pagina");
			pagina.addClass("Mobiel");
		} else {
			pagina.removeClass("Mobiel");
			pagina.addClass("Pagina");
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
	$(".Menu").width(width -20);
}

function resizeContentMobiel(width, height) {
	$(".Content").width(width -20);
}

function resizeFooterMobiel(width, height) {
	$(".Footer").width(width -20);
}

function resizeSidebarMobiel(width, height) {
	$("sidebar")
}