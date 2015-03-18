$(function() {
	highlightMenu();
});
var menu;
function highlightMenu() {
	if(PHP.page.hasSubMenu == "false"){
		jQuery("#Menu_" + PHP.page.menuEntry)
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