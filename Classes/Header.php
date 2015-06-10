<?php
	// Header Class is gemaakt zodat elke pagina de zelfde header hebben
	// Bedoelt om makkelijk een head te bouwen.
	
	class Header {
		private static $scriptCollection = array(
			'<script src="%root%/JavaScript/libs/jquery.min.js"></script>',
			'<link rel="stylesheet" href="%root%/CSS/libs/jquery-ui.css" />',
			'<script src="%root%/JavaScript/libs/jsPDF.js"></script>',
			'<script src="%root%/JavaScript/libs/jquery-ui.min.js"></script>',
			'<link href="%root%/CSS/libs/css_VarelaRound.css" rel="stylesheet" type="text/css" />',
			'<link href="%root%/CSS/-min.php" type="text/css" rel="stylesheet" />',
			'<script src="https://apis.google.com/js/platform.js" async defer></script>',
			'<script src="%root%/JavaScript/-min.php"></script>',
		);		
		
		public static function getMetaTags() {
			$ret = PHP_EOL;
			$ret .= '<meta http-equiv="Content-type" content="text/html; charset=' . MktConfig::$utf . '" />' . PHP_EOL;
			$ret .= '<meta name="viewport" content="width=device-width, initial-scale=1" />' . PHP_EOL;
			$ret .= '<meta name="Language" content="Dutch" />' . PHP_EOL;
			$ret .= '<meta charset="' . MktConfig::$utf . '" />'. PHP_EOL;
			if(MktConfig::$robot === true) {
				$ret .= '<meta name="robots" content="index, follow" />'. PHP_EOL;
				$ret .= '<meta name="revisit" content="3 days" />'. PHP_EOL;
				$ret .= '<meta name="revisit-after" content="3 days" />'. PHP_EOL;
				$ret .= '<meta name="googlebot" content="noodp" />'. PHP_EOL;
				$ret .= '<meta name="Slurp" content="noydir" />'. PHP_EOL;
			}
			$ret .= '<meta name="description" content=' . str_replace(array('\n.', '\n\n', '\n', '  '), ' ', 
					json_encode(strip_tags(implode(' ', array_slice(explode(' ', $GLOBALS['pageContent']->content), 0, 25))))) . ' />'. PHP_EOL;
			$builder = '';
			foreach(MktConfig::$keys as $key) {
				$builder .= $key . ', ';
			}
			if(isset($GLOBALS['pageContent']->menuEntry) && !empty($GLOBALS['pageContent']->menuEntry)){
				$builder .= $GLOBALS['pageContent']->menuEntry . ', ';
			}
			if(isset($GLOBALS['pageContent']->sub) && !empty($GLOBALS['pageContent']->sub)){
				$builder .= $GLOBALS['pageContent']->sub . ', ';
			}
			$builder = rtrim($builder, ', ');
			$ret .= '<meta name="keywords" content="' . $builder . '" />'. PHP_EOL;
			$ret .= '<meta name="generator" content="PHP-Template 1.0" />'. PHP_EOL;
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
			if(file_exists(MktUtils::file(array('.', 'Content', 'IncludeScripts.html')))) {
				$ret .= file_get_contents(MktUtils::file(array('.', 'Content', 'IncludeScripts.html')));
			}
			return MktUtils::rootString($ret);
		}
		
		public static function phpToJS($MktPage, $MktMenu) {
			$ret = PHP_EOL;
			$ret .= '<script>';
			$ret .= 'PHP = {};';
			
			$ret .= 'PHP.mainmenu = {};';
			$tmp = explode('(', MktColor::$Menu_Outline);
			$tmp = $tmp[1];
			$tmp = explode(')', $tmp);
			$tmp = $tmp[0];
			$ret .= 'PHP.mainmenu.color = "' . $tmp . '";';
			$ret .= 'PHP.mainmenu.opacity = ' .  MktColor::$Menu_Highlight;
			$ret .= 'PHP.mainmenu.count = ' . $MktMenu->getAmount() . ';';
			$ret .= 'PHP.mainmenu.items = {};';
			for($i=0; $i<$MktMenu->getAmount();$i++) {
				$ret .= "PHP.mainmenu.items[$i] = {};";
				$ret .= "PHP.mainmenu.items[$i].name = " . json_encode($MktMenu->items[$i]->name) . ';';
				$ret .= "PHP.mainmenu.items[$i].alt = " . json_encode($MktMenu->items[$i]->alt) . ';';
				$ret .= "PHP.mainmenu.items[$i].href = " . json_encode($MktMenu->items[$i]->href) . ';';
				$ret .= "PHP.mainmenu.items[$i].prio = " . json_encode($MktMenu->items[$i]->prio) . ';';
				$ret .= "PHP.mainmenu.items[$i].error = " . json_encode($MktMenu->items[$i]->errorMessage) . ';';
			}
			
			$ret .= 'PHP.page = {};';
			$ret .= 'PHP.page.type = ' . json_encode($MktPage->page) . ';';
			$ret .= 'PHP.page.content = ' . json_encode($MktPage->content) . ';';
			$ret .= 'PHP.page.error = ' . json_encode($MktPage->errorMessage) . ';';
			$ret .= 'PHP.page.menuEntry = ' . json_encode($MktPage->menuEntry) . ';';
			$ret .= 'PHP.page.hasBanner = ' . json_encode($MktPage->hasBanner) . ';';
			$ret .= 'PHP.page.hasSideBar = ' . json_encode(isset($MktPage->sub) && !empty($MktPage->sub)) . ';';
			$ret .= 'PHP.page.highlightSubMenu = ' . json_encode($MktPage->SubIndex) . ';';
			$ret .= 'PHP.page.highlightSubColor = ' . json_encode(MktColor::$Sub_Item_Highlight) . ';';
			$ret .= 'PHP.page.title = ' . json_encode($GLOBALS['pageContent']->getTitle()) . ';';
			$ret .= 'PHP.isMobiel = ' . json_encode($GLOBALS['mob']->isMobile()) . ';';
			
			$ret .= '</script>' . PHP_EOL;
			return $ret;
		}
	}
?>