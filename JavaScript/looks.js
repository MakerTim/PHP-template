//Debug = Log all the things!
var d = false;

$(function() {
	//When document is ready with loading
	registerSideMenuEvents();
	
	$(window).resize(function(event) {
		onResize(event.currentTarget.innerWidth, event.currentTarget.innerHeight);;
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

var g2d;
function resizeBanner(width, height) {
	g2d = $("#Banner").get(0).getContext("2d");
}

function resizeMenu(width, height) {
	$(".Menu").width(width * 0.8 - 2);
}

function resizeContent(width, height) {
	$(".Content").width(width * 0.8 * 0.8 -16);
}

function resizeFooter(width, height) {
	$(".Footer").width(width * 0.8 - 2);
}

function resizeSidebar(width, height) {
	$(".sidebar").width(width * 0.8 * 0.2);
}