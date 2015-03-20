<?php
	// Include hier alle classes,
	// Zodat elke andere pagina maar 1 include nodig heeft!
	// Ook zorgd dit voor de session start
	// $GLOBALS["md"] = MarkDown parser *http://parsedown.org/
	// $GLOBALS["mob"] = MarkDown parser *http://mobiledetect.net/
	
	session_start();
	
	include("Parsedown.php");
	include("MobileDetect.php");
	$md =  new Parsedown();
	$mob =  new Mobile_Detect();
	include("MktUtils.php");
	include("MktConfig.php");
	include("Header.php");
	include("Menu.php");
	include("MktPage.php");
	
?>