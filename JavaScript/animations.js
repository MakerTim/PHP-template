function loadAnimations() {
	highlightMenu();
};

function highlightMenu() {
	$("#Menu_" + PHP.page.menuEntry).addClass("menuSelected");
	if(PHP.isMobiel) {
		$(".menuSelected").css("display", "block");
	} else {
		$(".menuSelected").css("display", "inline");
	}
	$(".menuSelected")
		.animate({
			backgroundColor: "#ffffff",
			opacity: 0.5,
			borderBottomRightRadius: 15,
			borderBottomLeftRadius: 15,
			paddingBottom: 25,
			paddingLeft: 14,
			paddingRight: 14,
			borderWidth: 2
			}, 500);
}