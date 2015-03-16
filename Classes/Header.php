<?php
class Header {
	private static $utf = "UTF-8";
	
	private static $scriptCollection = array(
	'<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>', 
	'<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />',
	'<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>',
	'');
	
	public static function getMetaTags() {
		return '<meta http-equiv="Content-type" content="text/html; charset=' . self::$utf . '" />' . PHP_EOL . 
		'<meta http-equiv="Content-Language" content="nl" />' . PHP_EOL . 
		'<meta name="Language" content="Dutch" />' . PHP_EOL . 
		'<meta charset="' . self::$utf . '" />'. PHP_EOL . 
		'<meta name="robots" content="index, follow" />'. PHP_EOL . 
		'<meta name="revised" content="3 days" />'. PHP_EOL . 
		'<meta name="revised-after" content="3 days" />'. PHP_EOL . 
		'<meta name="googlebot" content="noodp" />'. PHP_EOL . 
		'<meta name="Slurp" content="noydir" />'. PHP_EOL;
	}
	
	public static function getDefaultHeader($MktPage) {
		
	}
}
?>