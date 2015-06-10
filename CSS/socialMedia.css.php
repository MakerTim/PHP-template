<?php 
	header('Content-Type: text/css');
	require(join(DIRECTORY_SEPARATOR, array('..', 'Classes', 'IncludeManager.php')));
	ob_start('ob_gzhandler');
 ?>
 .SocialMedia {
	display: block;
}

.Pagina .SocialMedia {
	position: absolute;	
}
	
.Mobiel .SocialMedia {
	position: relative;	
}

.SocialMedia .sub{
	display: inline;
	margin: 2px;
	background: <?php echo MktColor::$Media_Background;?>
	padding: 6px 6px 5px 6px;
}

.SocialMedia .tweet{
	position: relative;
	top: 5px;
	display: inline;
}