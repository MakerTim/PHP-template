function resizeMobiel(width, height) {
	if(d) {
		console.log(width, height);
	}
	$("#Pagina").width(width * 0.8);
	resizeBannerMobiel(width, height);
	resizeMenuMobiel(width, height);
	resizeContentMobiel(width, height);
	resizeFooterMobiel(width, height);
	resizeSidebarMobiel(width, height);
}

function resizeBannerMobiel(width, height) {
	canvas = $("#Banner").get(0);
	g2d = canvas.getContext("2d");
	img = $("#BannerSrc").get(0);
	
	ht = 130, ms = 1920;
	vw = Math.max(Math.min((width*0.8), ms), mob);
	nvw = Math.min((width*0.8), ms);
	
	canvas.height = ht;
	canvas.width  = nvw;
	
	g2d.drawImage(img, (mob-((vw-mob)/2)), 0, vw, ht, 0, 0, nvw, ht);
}

function resizeMenuMobiel(width, height) {
	
}

function resizeContentMobiel(width, height) {
	
}

function resizeFooterMobiel(width, height) {
	
}

function resizeSidebarMobiel(width, height) {
	
}