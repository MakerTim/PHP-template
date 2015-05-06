//Debug = Log all the things!
var d = false;
var mob = 640;
var isMob;

$(function() {
	try {
		loadAnimations();
	} catch (e) { 
		$("#Errnor").html($("#Errnor").html() + "No Animation - " + e + "<br />");
	}
	try {
		loadCookies();
	} catch (e) { 
		$("#Errnor").html($("#Errnor").html() + "No Cookie - " + e + "<br />");
	}
	try {
		loadLooks();
	} catch (e) { 
		$("#Errnor").html($("#Errnor").html() + "No Look - " + e + "<br />");
	}
	try {
		loadLooksMobiel();
	} catch (e) { 
		$("#Errnor").html($("#Errnor").html() + "No Look Mobiel - " + e + "<br />");
	}
	try {
		loadMedia();
	} catch (e) { 
		$("#Errnor").html($("#Errnor").html() + "No Media - " + e + "<br />");
	}
});

function loadLooks() {
	if(PHP.page.hasSideBar){
		registerSideMenuEvents();
	}
	$(".Popup").each(function(i, element){
		Popup($(element));
	});
	$(window).resize(function() {
		updateResize();
	});
	$("img").load(function() {
		updateResize();
	});	
	updateResize();
}

function registerSideMenuEvents() {
	$('.sidebar .open').children('ul').show();
	$('.sidebar li.has-sub>a').on('click', function() {
		element = $(this).parent('li');
		if (element.hasClass('open')) {
			link = $(this).attr('data-href');
			if(link != undefined && !(link == "" || link == "#")){
				window.location.href = link;
			} else {
				element.removeClass('open');
				element.find('li').removeClass('open');
				element.find('ul').slideUp(200);
			}
		} else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
		if(!isMob) {
			for(i=0; i<201; i++){
				setTimeout(updateForSide, i);
			}
		}
	});
}

function Popup(jqElement){
	jqElement.click(function(){
		$.ajax(jqElement.attr("data-page")).done(function(e){
			$("body").append(e);
		});
	});
}

function updateForSide(){
	resizeContent(window.innerWidth, window.innerHeight)
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
	if(PHP.page.hasSideBar){
		resizeSidebar(width, height);
	}
}

function resizeBanner(width, height) {
	canvas = $("#Banner").get(0);
	if(canvas == undefined){
		return;
	}
	g2d = canvas.getContext("2d");
	img = $("#BannerSrc").get(0);
	
	ht = 130, st = 640, ms = 1920;
	vw = Math.max(Math.min((width*0.8), ms), mob);
	nvw = Math.min((width*0.8), ms);
	
	canvas.height = ht;
	canvas.width  = nvw;
	
	g2d.drawImage(img, (st-((vw-mob)/2)), 0, vw, ht, 0, 0, nvw, ht);
	
	$(".SocialMedia").css("top", $("#Banner").height() - 10)
			.css("right", width * 0.1);
}

function resizeMenu(width, height) {
	$(".Menu").width(width * 0.8);
}

function resizeContent(width, height) {
	if(PHP.page.hasSideBar){
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