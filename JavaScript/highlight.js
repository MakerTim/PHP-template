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

function highlightSubMenu() {
	if(PHP.page.highlightSubMenu != undefined && PHP.page.highlightSubMenu != ""){
		highlight = PHP.page.highlightSubMenu.replace(/\s/g, "").split(">");
		if(highlight.length > 0) { 
			$("#Side_" + highlight[0]).addClass("open");
			if(highlight.length > 1) {
				$("#Side_Sub_" + highlight[1] + ">a").attr("style", "background-color: " + PHP.page.highlightSubColor);
			} else {
				$("#Side_" + highlight[0] + ">a").attr("style", "background-color: " + PHP.page.highlightSubColor);
			}
		}
	}
}

function onDownload() {
	pdf = new jsPDF();
	content = $(".Content").children()[1];
	specialElementHandlers = { };
	margins = { top: 10, bottom: 10, left: 10, width: 500 };
	pdf.fromHTML(content, margins.left, margins.top, {
		'width': margins.width,
		'elementHandlers': specialElementHandlers
		},
		function (dispose) {
			pdf.save(PHP.page.title + '.pdf');
		},
		margins
	);
}

function onMail() {
	content = $(PHP.page.content).text();
	content = content.replace(/[!-/:-@[-`{-~]+/g, '') + "\n\nDeze content is afkomstig van: " + window.location.href;
	link = "mailto:?subject=" + PHP.page.title + "&body=" + escape(content);
	success = window.open(link, "_blank");
	if(!success){
		window.location.href = link;
	}
}

function onPrint() {
	print();
}