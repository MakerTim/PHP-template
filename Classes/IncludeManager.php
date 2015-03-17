<?php
	// Include hier alle classes,
	// Zodat elke andere pagina maar 1 include nodig heeft!
	// Ook zorgd dit voor de session start
	// $GLOBALS["md"] = MarkDown parser *http://parsedown.org/
	
	session_start();
	
	include("Parsedown.php");
	$md =  new Parsedown();
	include("MktConfig.php");
	include("Header.php");
	include("Menu.php");
	include("MktPage.php");
	
?>