$(function() {
	highlightMenu();
});
var menu;
function highlightMenu() {
	if(PHP.page.hasSubMenu == "false"){
		jQuery("#Menu_" + PHP.page.menuEntry)
			.css({
				borderStyle: "solid",
				borderTopColor: "#C0C0C0",
				borderLeftColor: "#C0C0C0",
				borderRightColor: "#C0C0C0",
				borderBottomColor: "#C0C0C0",
				borderWidth: "0px"
				})
			.animate({
				backgroundColor: "#ffffff",
				opacity: 0.5 
				}, 1500)
			.animate({
				borderRadius: 15,
				borderWidth: 3
				});
	}
}