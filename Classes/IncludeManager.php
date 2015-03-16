<?php
	// Include hier alle classes,
	// Zodat elke andere pagina maar 1 include nodig heeft!
	// Ook zorgd dit voor de session start
	
	session_start();
	
	include("Parsedown.php");
	include("MktConfig.php");
	include("Header.php");
	include("Menu.php");
	include("MktPage.php");
	
?>