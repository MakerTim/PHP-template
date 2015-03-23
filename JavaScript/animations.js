$(function() {
	highlightMenu();
});

function highlightMenu() {
	$("#Menu_" + PHP.page.menuEntry)
		.animate({
			backgroundColor: "#ffffff",
			opacity: 0.5 
			}, 1500)
		.animate({
			borderBottomRightRadius: 15,
			borderBottomLeftRadius: 15,
			paddingBottom: 25,
			paddingLeft: 14,
			paddingRight: 14,
			borderWidth: 2
			}, 500);
}