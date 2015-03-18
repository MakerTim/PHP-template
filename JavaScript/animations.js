$(function() {
	highlightMenu();
});
var menu;
function highlightMenu() {
	if(PHP.page.hasSubMenu == "false"){
		menu = jQuery("#Menu_" + PHP.page.menuEntry);
		/*menu.animate({
			backgroundColor: "#ffffff",
			opacity: 0.5
		}, 1500);*/
	}
}