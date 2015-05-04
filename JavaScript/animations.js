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
	if($(".menuSelected").size() > 0){
		color = PHP.mainmenu.color.split(", ");
		$(".menuSelected")
		.animate({
			backgroundColor: "rgba(" + color[0] + "," + color[1] + "," + color[2] + "," + PHP.mainmenu.opacity + ")",
			borderBottomRightRadius: 15,
			borderBottomLeftRadius: 15,
			paddingBottom: 25,
			paddingLeft: 14,
			paddingRight: 14,
			borderWidth: 2
			}, 500);
	}
}