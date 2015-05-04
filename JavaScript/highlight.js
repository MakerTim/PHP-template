function loadAnimations() {
	highlightMenu();
	highlightSubMenu();
};

function highlightMenu() {
	$("#Menu_" + PHP.page.menuEntry.replace(/\s/g, "")).addClass("menuSelected");
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
			paddingBottom: 25,
			paddingLeft: 14,
			paddingRight: 14,
			borderWidth: 2
			}, 500)
			.css("borderBottomRightRadius", 15)
			.css("borderBottomLeftRadius", 15);
	}
}
var highlight;
function highlightSubMenu() {
	if(PHP.page.highlightSubMenu != undefined && PHP.page.highlightSubMenu != ""){
		highlight = PHP.page.highlightSubMenu.replace(/\s/g, "").split(">");
		if(highlight.length > 0){ 
			$("#Side_" + highlight[0]).addClass("open");
			if(highlight.length > 1){
				$("#Side_Sub_" + highlight[1] + ">a").attr("style", "background-color: " + PHP.page.highlightSubColor);
			}
		}
	}
}