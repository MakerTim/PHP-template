<?php 
	header('Content-Type: text/css');
	require(join(DIRECTORY_SEPARATOR, array('..', 'Classes', 'IncludeManager.php')));
 ?>
 .Mobiel .sidebar ul, .Mobiel .sidebar ul li a, .Mobiel .sidebar ul li  {
	margin: 0;
	padding: 0;
	list-style: none;
	display: block;
	position: relative;
	border-bottom: 1px solid <?php echo MktColor::$Sub_Item_Border; ?>
}

.Mobiel .sidebar {
	float : left;
	position: fixed;
	z-index: 100;
	width: 33%;
	height: 100%;
	font-size: 250% !important;
}

.Mobiel .sidebar ul ul {
	display: none;
}

.Mobiel .sidebar > ul > li.active > ul {
	display: block;
}

.Mobiel .align-right {
	float: right;
}

.Mobiel .sidebar > ul > li > a {
	padding: 16px 22px;
	cursor: pointer;
	z-index: 2;
	text-decoration: none;
	color: <?php echo MktColor::$Sub_Text; ?>
	background: <?php echo MktColor::$Sub_Item; ?>
}

.Mobiel .sidebar ul > li.has-sub > a:after {
	position: absolute;
	right: 26px;
	top: 19px;
	z-index: 5;
	display: block;
	height: 10px;
	width: 2px;
	background: <?php echo MktColor::$Sub_Item_Hover; ?>
	content: "";
}

.Mobiel .sidebar ul > li.has-sub > a:before {
	position: absolute;
	right: 22px;
	top: 23px;
	display: block;
	width: 10px;
	height: 2px;
	background: <?php echo MktColor::$Sub_Item_Hover; ?>
	content: "";
}

.Mobiel .sidebar ul > li.has-sub.open > a:after, .Mobiel .sidebar ul > li.has-sub.open > a:before {
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
}

.Mobiel .sidebar ul ul li a {
	padding: 14px 22px;
	cursor: pointer;
	z-index: 2;
	text-decoration: none;
	color: <?php echo MktColor::$Sub_Text; ?>
	background: <?php echo MktColor::$Sub_Item_Sub; ?>
}

.Mobiel .sidebar ul ul ul li a {
	padding-left: 32px;
}

.Mobiel .sidebar ul ul > li.has-sub > a:after {
	top: 16px;
	right: 26px;
}

.Mobiel .sidebar ul ul > li.has-sub > a:before {
	top: 20px;
}

.Mobiel .MenuButton {
    height: 100px;
    position: relative;
	background: <?php echo MktColor::$Sub_Item; ?>
	text-align: center;
	border-top: 6px solid <?php echo MktColor::$Lijntje; ?>
}

.Mobiel .MenuButton  img {
	width: 100px;
	height: 100px;
}

.Mobiel .ulSidebar{
	background-color: <?php echo MktColor::$Sub_Item; ?>
	overflow-y: auto;
	border-top: 1px solid <?php echo MktColor::$Lijntje; ?>
}

.Mobiel .ulSidebar p{
	line-height: 0%;
}