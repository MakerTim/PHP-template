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
	height : 130px;
	margin-bottom: 10px;
}

.Mobiel .Menu{
	float : left;
	background-color: <?php echo MktColor::$Menu_Background; ?>
	margin-bottom: 10px;
	border-top: 6px solid <?php echo MktColor::$Lijntje; ?>
	font-size: 400% !important; 
	/* 
		Dear Future me,
		I spend the last few weeks fixing the mobile version the menu
		Now i did the 400% trick, it has magical working great and we will leave it as it is
		
		now like my dick size, someone will only ignore the !important, should have a look after this problem in the future...
		greetings
		past me
	*/
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

.Mobiel .Content{
	float : left;
	background-color: <?php echo MktColor::$Markdown_Background; ?>
	margin-top: 10px;
	border-top: 6px solid <?php echo MktColor::$Markdown_Outline; ?>
}

.Mobiel .Footer{
	background-color: <?php echo MktColor::$Footer_Background; ?>
	text-align: center;
	position: fixed;
	bottom: 5px;
	word-wrap: break-word;
	margin-bottom: 5px;
	border-top: 6px solid <?php echo MktColor::$Lijntje; ?>
	font-size: 180% !important;
}
.Mobiel .Footer a{ 
    color: <?php echo MktColor::$Footer_Text; ?>
	text-decoration: none;
}

.Mobiel .Footer a:active { 
    color: <?php echo MktColor::$Footer_Text; ?>
	text-decoration: none;
}

.Mobiel .Rounded{
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	-moz-border-radius-topleft: 10px;
	-moz-border-radius-topright: 10px;
	-webkit-border-top-left-radius:10px;
	-webkit-border-top-right-radius:10px;
	
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
	-moz-border-radius-bottomleft: 10px;
	-moz-border-radius-bottomright: 10px;
	-webkit-border-bottom-left-radius:10px;
	-webkit-border-bottom-right-radius:10px;
}

.Mobiel .RoundedTop{
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	-moz-border-radius-topleft: 10px;
	-moz-border-radius-topright: 10px;
	-webkit-border-top-left-radius:10px;
	-webkit-border-top-right-radius:10px;
}

.Mobiel .RoundedBottom{
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
	-moz-border-radius-bottomleft: 10px;
	-moz-border-radius-bottomright: 10px;
	-webkit-border-bottom-left-radius:10px;
	-webkit-border-bottom-right-radius:10px;
}
