//Debug = Log all the things!
var d = false;
var mob = 640;

$(function() {
	//When document is ready with loading
	registerSideMenuEvents();
	
	$(window).resize(function(event) {
		onResize(event.currentTarget.innerWidth, event.currentTarget.innerHeight);;
	});
	$("#BannerSrc").load(function() {
		resizeBanner(window.innerWidth, window.innerHeight);
	});
	onResize(window.innerWidth, window.innerHeight);
	
});

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
	});
}

function onResize(width, height) {
	if(d) {
		console.log(width, height);
	}
	$(".Pagina").width(width * 0.8);
	resizeBanner(width, height);
	resizeMenu(width, height);
	resizeContent(width, height);
	resizeFooter(width, height);
	resizeSidebar(width, height);
}

function resizeBanner(width, height) {
	canvas = $("#Banner").get(0);
	g2d = canvas.getContext("2d");
	img = $("#BannerSrc").get(0);
	
	ht = 130, st = 640, ms = 1920, wh = 640;
	vw = Math.max(Math.min((width*0.8), ms), wh);
	
	canvas.height = ht;
	canvas.width  = vw;
	
	g2d.drawImage(img, (st-((vw-wh)/2)), 0, vw, ht, 0, 0, vw, ht);
}

function resizeMenu(width, height) {
	$(".Menu").width(width * 0.8 - 2);
}

function resizeContent(width, height) {
	if (PHP.page.hasSideBar == "false")
	{
		$(".Content").width(width * 0.8 -2);
	}
	else
	{
		$(".Content").width(width * 0.8 * 0.8 -16);
	}
}

function resizeFooter(width, height) {
	$(".Footer").width(width * 0.8 - 2);
}

function resizeSidebar(width, height) {
	$(".sidebar").width(width * 0.8 * 0.2);
}