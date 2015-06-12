<?php
	if(isset($_GET) && isset($_GET["p"])){
		$site = str_replace("$", "&", $_GET["p"]);
		echo file_get_contents("http://$site");
	}
?>