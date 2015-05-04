<?php
	// Include hier alle classes,
	// Zodat elke andere pagina maar 1 include nodig heeft!
	// Ook zorgd dit voor de session start
	// $GLOBALS["md"] = MarkDown parser *http://parsedown.org/
	// $GLOBALS["mob"] = MarkDown parser *http://mobiledetect.net/
	
	session_set_cookie_params(60 * 60 * 24 * 28, '/');
	session_start();
	
	require 'Parsedown.php';
	require 'MobileDetect.php';
	$md =  new Parsedown();
	$mob =  new Mobile_Detect();
	require 'MktUtils.php';
	require 'MktConfig.php';
	require 'Counter.php';
	require 'Header.php';
	require 'Menu.php';
	require 'MktPage.php';
?>