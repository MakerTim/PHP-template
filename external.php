<?php
	if(isset($_GET) && isset($_GET["p"])){
		echo file_get_contents("http://$_GET[p]");
	}
?>