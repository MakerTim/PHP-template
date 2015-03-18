<?php
	// Header Class is gemaakt zodat elke pagina de zelfde header hebben
	// Bedoelt om makkelijk een head te bouwen.
	
	class Header {
		private static $scriptCollection = array(
		'<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>', 
		'<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />',
		'<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>',
		'<link href="CSS\style.css" type="text/css" rel="stylesheet" />',
		'<link href="CSS\markdown.css" type="text/css" rel="stylesheet" />',
		'<script src="JavaScript\looks.js"></script>');
		
		public static function getMetaTags() {
			$ret = "";
			$ret .= '<meta http-equiv="Content-type" content="text/html; charset=' . MktConfig::$utf . '" />' . PHP_EOL;
			$ret .= '<meta http-equiv="Content-Language" content="nl" />' . PHP_EOL;
			$ret .= '<meta name="Language" content="Dutch" />' . PHP_EOL;
			$ret .= '<meta charset="' . MktConfig::$utf . '" />'. PHP_EOL;
			if(MktConfig::$robot === true) {
				$ret .= '<meta name="robots" content="index, follow" />'. PHP_EOL;
				$ret .= '<meta name="revised" content="3 days" />'. PHP_EOL;
				$ret .= '<meta name="revised-after" content="3 days" />'. PHP_EOL;
				$ret .= '<meta name="googlebot" content="noodp" />'. PHP_EOL;
				$ret .= '<meta name="Slurp" content="noydir" />'. PHP_EOL;
			}
			$ret .= '<meta name="description" content="' . MktConfig::$desc . '" />'. PHP_EOL;
			$builder = "";
			foreach(MktConfig::$keys as $key) {
				$builder .= $key . ', ';
			}
			$builder = rtrim($builder,", ");
			$ret .= '<meta name="keywords" content="' . $builder . '" />'. PHP_EOL;
			$ret .= '<title> ' . MktConfig::$title . ' </title>'. PHP_EOL;
			$ret .= '<link rel="shortcut icon" href="Pictures/favicon.ico">'. PHP_EOL;
			$ret .= '<meta name="author" content="' . MktConfig::$domein . '" />'. PHP_EOL;
			return $ret;
		}
		
		public static function getDefaultHeader() {
			$ret = '';
			foreach(Header::$scriptCollection as $script) {
				$ret .= $script . PHP_EOL;
			}
			return $ret;
		}
		
		public static function phpToJS($MktPage, $MktMenu) {
			$ret = "<script>" . PHP_EOL;
			$ret .= "PHP = {};" . PHP_EOL;
			
			$ret .= "PHP.mainmenu = {};" . PHP_EOL;
			$ret .= "PHP.mainmenu.count = " . $MktMenu->getAmount() . ";" . PHP_EOL;
			$ret .= "PHP.mainmenu.items = {};" . PHP_EOL;
			for($i=0; $i<$MktMenu->getAmount();$i++) {
				$ret .= "PHP.mainmenu.items[$i] = {}" . PHP_EOL;
				$ret .= "PHP.mainmenu.items[$i].name = " . json_encode($MktMenu->items[$i]->name) . ";" . PHP_EOL;
				$ret .= "PHP.mainmenu.items[$i].alt = " . json_encode($MktMenu->items[$i]->alt) . ";" . PHP_EOL;
				$ret .= "PHP.mainmenu.items[$i].href = " . json_encode($MktMenu->items[$i]->href) . ";" . PHP_EOL;
				$ret .= "PHP.mainmenu.items[$i].prio = " . json_encode($MktMenu->items[$i]->prio) . ";" . PHP_EOL;
				$ret .= "PHP.mainmenu.items[$i].error = " . json_encode($MktMenu->items[$i]->errorMessage) . ";" . PHP_EOL;
				$ret .= "PHP.mainmenu.items[$i].sub = " . json_encode($MktMenu->items[$i]->sub) . ";" . PHP_EOL;
			}
			
			$ret .= "PHP.page = {};" . PHP_EOL;
			$ret .= "PHP.page.type = " . json_encode($MktPage->page) . ";" . PHP_EOL;
			$ret .= "PHP.page.content = " . json_encode($MktPage->content) . ";" . PHP_EOL;
			$ret .= "PHP.page.error = " . json_encode($MktPage->errorMessage) . ";" . PHP_EOL;
			$ret .= "PHP.page.menuEntry = " . json_encode($MktPage->menuEntry) . ";" . PHP_EOL;
			$ret .= "PHP.page.hasBanner = " . json_encode($MktPage->hasBanner) . ";" . PHP_EOL;
			$ret .= "PHP.page.hasSubMenu = " . json_encode($MktPage->hasSubMenu) . ";" . PHP_EOL;
			
			$ret .= "</script>" . PHP_EOL;
			return $ret;
		}
	}
?>