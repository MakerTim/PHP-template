<?php
	// Header Class is gemaakt zodat elke pagina de zelfde header hebben
	// Bedoelt om makkelijk een head te bouwen.
	
	class Header {
		private static $scriptCollection = array(
		'<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>', 
		'<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />',
		'<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>',
		'');
		
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
			foreach(MktConfig::$keys as $key){
				$builder .= $key . ', ';
			}
			$builder = rtrim($builder,", ");
			$ret .= '<meta name="keywords" content="' . $builder . '" />'. PHP_EOL;
			$ret .= '<title> ' . MktConfig::$title . ' </title>'. PHP_EOL;
			$ret .= '<link rel="shortcut icon" href="Pictures/favicon.ico">'. PHP_EOL;
			$ret .= '<meta name="author" content="' . MktConfig::$domein . '" />'. PHP_EOL;
			return $ret;
		}
		
		public static function getDefaultHeader($MktPage) {
			
		}
	}
?>