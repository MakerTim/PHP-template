<?php 
	header('Content-Type: text/css');
	require(join(DIRECTORY_SEPARATOR, array('..', 'Classes', 'IncludeManager.php')));
 ?>
 .Mobiel{
	margin : 20px auto 0 auto;
	font-family: 'Varela Round', Helvetica, Arial, sans-serif;
}

.Mobiel .Header{
	float : left;
	margin-bottom: 10px;
}

.Mobiel .tweet>*, .Mobiel .tweet>*>*, .Mobiel .tweet>*>*>* {
    height: inherit;
    width: inherit;
	text-decoration: none;
}

.Mobiel .Menu{
	float : left;
	background-color: <?php echo MktColor::$Menu_Background; ?>
	margin-bottom: 10px;
	font-size: 125% !important;
}

.Mobiel .Menu ul {
	list-style-type: none;
}

.Mobiel .Menu ul li {
	padding: 15px;
	border: 0px solid <?php echo MktColor::$Menu_Outline; ?>
	margin-left: -40px;
}

.Mobiel .Menu ul li a{ 
    color: <?php echo MktColor::$Menu_Text; ?>
	text-decoration: none;
	margin:auto; 
	text-align:center; 
	display:block;
}

.Mobiel .Menu ul li a:active { 
    color: <?php echo MktColor::$Menu_Text; ?>
	text-decoration: none;
}

.Mobiel .menuImg{
	text-align: center;
	padding: 0px !important;
}

.Mobiel .menuImg img{
	width: 50px;
	height: 50px;
}

.Mobiel .menuItem{
	cursor: hand;
	cursor: pointer;
}

.Mobiel .menuSelected{
	margin-bottom: -16px;
}

.Mobiel .ContentButtons{
	position: absolute;
	z-index: 20;
}

.Mobiel .ContentButtons img{
	padding-right: 6px;
	cursor: pointer;
}
	
.Mobiel .Content{
	float : left;
	background-color: <?php echo MktColor::$Markdown_Background; ?>
	margin-top: 10px;
}

.Mobiel .Footer{
	float : left;
	background-color: <?php echo MktColor::$Footer_Background; ?>
	margin-top: 10px;
	margin-bottom: 5px;
	text-align:center;
	word-wrap: break-word;
}

.Mobiel .Footer a{ 
    color: <?php echo MktColor::$Footer_Text; ?>
	text-decoration: none;
}

.Mobiel .Footer a:active { 
    color: <?php echo MktColor::$Footer_Text; ?>
	text-decoration: none;
}

.Mobiel .RoundedTop, .Mobiel .Rounded{
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	-moz-border-radius-topleft: 10px;
	-moz-border-radius-topright: 10px;
	-webkit-border-top-left-radius:10px;
	-webkit-border-top-right-radius:10px;
}

.Mobiel .RoundedBottom, .Mobiel .Rounded{
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
	-moz-border-radius-bottomleft: 10px;
	-moz-border-radius-bottomright: 10px;
	-webkit-border-bottom-left-radius:10px;
	-webkit-border-bottom-right-radius:10px;
}

.Mobiel .TopBorder{
	border-top: <?php echo MktColor::$LijntjeDikte; ?> solid <?php echo MktColor::$Lijntje; ?>
}