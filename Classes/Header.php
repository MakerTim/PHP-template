<?php
	// Header Class is gemaakt zodat elke pagina de zelfde header hebben
	// Bedoelt om makkelijk een head te bouwen.
	
	class Header {
		private static $scriptCollection = array(
			'<script src="%root%/JavaScript/libs/jquery.min.js"></script>',
			'<link rel="stylesheet" href="%root%/CSS/libs/jquery-ui.css" />',
			'<script src="%root%/JavaScript/libs/jquery-ui.min.js"></script>',
			'<link href="%root%/CSS/libs/css_VarelaRound.css" rel="stylesheet" type="text/css" />',
			'<link href="%root%/CSS/style.css" type="text/css" rel="stylesheet" />',
			'<link href="%root%/CSS/mobiel.css" type="text/css" rel="stylesheet" />',
			'<link href="%root%/CSS/cookie.css" type="text/css" rel="stylesheet" />',
			'<link href="%root%/CSS/SocialMedia.css" type="text/css" rel="stylesheet" />',
			'<link href="%root%/CSS/markdown.css" type="text/css" rel="stylesheet" />',
			'<link href="%root%/CSS/SubMenuStyle.css" type="text/css" rel="stylesheet" />',
			'<link href="%root%/CSS/SubMenuStyleMobiel.css" type="text/css" rel="stylesheet" />',
			'<script src="https://apis.google.com/js/platform.js" async defer> {lang: \'nl\'} </script>',
			'<script src="%root%/JavaScript/jCookie.js"></script>',
			'<script src="%root%/JavaScript/socialMedia.js"></script>',
			'<script src="%root%/JavaScript/cookie.js"></script>',
			'<script src="%root%/JavaScript/looks.js"></script>',
			'<script src="%root%/JavaScript/looksMobiel.js"></script>',
			'<script src="%root%/JavaScript/animations.js"></script>'
		);		
		
		public static function getMetaTags() {
			$ret = PHP_EOL;
			$ret .= '<meta http-equiv="Content-type" content="text/html; charset=' . MktConfig::$utf . '" />' . PHP_EOL;
			$ret .= '<meta name="Language" content="Dutch" />' . PHP_EOL;
			$ret .= '<meta charset="' . MktConfig::$utf . '" />'. PHP_EOL;
			if(MktConfig::$robot === true) {
				$ret .= '<meta name="robots" content="index, follow" />'. PHP_EOL;
				$ret .= '<meta name="revised" content="3 days" />'. PHP_EOL;
				$ret .= '<meta name="revised-after" content="3 days" />'. PHP_EOL;
				$ret .= '<meta name="googlebot" content="noodp" />'. PHP_EOL;
				$ret .= '<meta name="Slurp" content="noydir" />'. PHP_EOL;
			}
			$ret .= '<meta name="description" content=' . str_replace('\n', ' ', json_encode(strip_tags(implode(' ', array_slice(explode(' ', $GLOBALS['pageContent']->content), 0, 20))))) . ' />'. PHP_EOL;
			$builder = "";
			foreach(MktConfig::$keys as $key) {
				$builder .= $key . ', ';
			}
			$builder = rtrim($builder,", ");
			$ret .= '<meta name="keywords" content="' . $builder . '" />'. PHP_EOL;
			$ret .= '<title> ' . $GLOBALS['pageContent']->getTitle() . ' </title>'. PHP_EOL;
			$ret .= '<link rel="shortcut icon" href="Pictures/favicon.ico">'. PHP_EOL;
			$ret .= '<meta name="author" content="' . MktConfig::$domein . '" />'. PHP_EOL;
			return $ret;
		}
		
		public static function getDefaultHeader() {
			$ret = PHP_EOL;
			foreach(Header::$scriptCollection as $script) {
				$ret .= $script . PHP_EOL;
			}
			return MktUtils::rootString($ret);
		}
		
		public static function phpToJS($MktPage, $MktMenu) {
			$ret = PHP_EOL;
			$ret .= "<script>";
			$ret .= "PHP = {};";
			
			$ret .= "PHP.mainmenu = {};";
			$ret .= "PHP.mainmenu.count = " . $MktMenu->getAmount() . ";";
			$ret .= "PHP.mainmenu.items = {};";
			for($i=0; $i<$MktMenu->getAmount();$i++) {
				$ret .= "PHP.mainmenu.items[$i] = {};";
				$ret .= "PHP.mainmenu.items[$i].name = " . json_encode($MktMenu->items[$i]->name) . ";";
				$ret .= "PHP.mainmenu.items[$i].alt = " . json_encode($MktMenu->items[$i]->alt) . ";";
				$ret .= "PHP.mainmenu.items[$i].href = " . json_encode($MktMenu->items[$i]->href) . ";";
				$ret .= "PHP.mainmenu.items[$i].prio = " . json_encode($MktMenu->items[$i]->prio) . ";";
				$ret .= "PHP.mainmenu.items[$i].error = " . json_encode($MktMenu->items[$i]->errorMessage) . ";";
			}
			
			$ret .= "PHP.page = {};";
			$ret .= "PHP.page.type = " . json_encode($MktPage->page) . ";";
			$ret .= "PHP.page.content = " . json_encode($MktPage->content) . ";";
			$ret .= "PHP.page.error = " . json_encode($MktPage->errorMessage) . ";";
			$ret .= "PHP.page.menuEntry = " . json_encode($MktPage->menuEntry) . ";";
			$ret .= "PHP.page.hasBanner = " . json_encode($MktPage->hasBanner) . ";";
			$ret .= "PHP.page.hasSideBar = " . json_encode($MktPage->hasSideBar) . ";";
			$ret .= "PHP.isMobiel = " . json_encode($GLOBALS["mob"]->isMobile()) . ";";
			
			$ret .= "</script>" . PHP_EOL;
			return $ret;
		}
	}
?>