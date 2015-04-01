//Debug = Log all the things!
var d = false;
var mob = 640;
var isMob;

$(function() {
	loadAnimations();
	loadCookies();
	loadLooks();
	loadLooksMobiel();
	loadMedia();
});

function loadLooks() {
	if(PHP.page.hasSideBar == "true"){
		registerSideMenuEvents();
	}
	
	$(window).resize(function() {
		updateResize();
	});
	$("img").load(function() {
		updateResize();
	});	
	updateResize();
}

function registerSideMenuEvents() {
	$('.sidebar li.active').children('ul').show();
	$('.sidebar li.has-sub>a').on('click', function() {
		$(this).removeAttr('href');
		element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		} else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
		for(i=0; i<201; i++){
			setTimeout(updateResize, i);
		}
	});
}

function updateResize() {
	if(isMob == undefined){
		isMob = $("#Pagina").hasClass("Mobiel");
	}else if(!PHP.isMobiel) {
		setMob(window.innerWidth < 640, false);
	}
	onResize(window.innerWidth, window.innerHeight);
}

function onResize(width, height) {
	if(isMob) {
		resizeMobiel(width, height);
	} else {
		resizeDesktop(width, height);
	}
}

function resizeDesktop(width, height) {
	if(d) {
		console.log(width, height);
	}
	$("#Pagina").width(width * 0.8);
	resizeBanner(width, height);
	resizeMenu(width, height);
	resizeContent(width, height);
	resizeFooter(width, height);
	if(PHP.page.hasSideBar == "true"){
		resizeSidebar(width, height);
	}
}

function resizeBanner(width, height) {
	canvas = $("#Banner").get(0);
	g2d = canvas.getContext("2d");
	img = $("#BannerSrc").get(0);
	
	ht = 130, st = 640, ms = 1920;
	vw = Math.max(Math.min((width*0.8), ms), mob);
	nvw = Math.min((width*0.8), ms);
	
	canvas.height = ht;
	canvas.width  = nvw;
	
	g2d.drawImage(img, (st-((vw-mob)/2)), 0, vw, ht, 0, 0, nvw, ht);
}

function resizeMenu(width, height) {
	$(".Menu").width(width * 0.8);
}

function resizeContent(width, height) {
	if(PHP.page.hasSideBar == "true"){
		$(".Content").width(width * 0.8 * 0.8 -16);
		if($(".sidebar").height() > $(".markdown-body").height()) {
			$(".Content").height(Math.max($(".markdown-body").height() + 20, $(".sidebar").height()));
		} else { 
			$(".Content").height("auto");
		}
	} else {
		$(".Content").width(width * 0.8);
	}
	$(".Content").css("margin-bottom", 15);
}

function resizeFooter(width, height) {
	$(".Footer").width(width * 0.8);
}

function resizeSidebar(width, height) {
	$(".sidebar").width(width * 0.8 * 0.2);
	$(".MenuButton img").hide();
}