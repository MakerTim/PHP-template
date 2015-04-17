<?php 
	header('Content-Type: text/css');
	require(join(DIRECTORY_SEPARATOR, array('..', 'Classes', 'IncludeManager.php')));
 ?>
 .Pagina .sidebar ul, .Pagina .sidebar ul li a, .Pagina .sidebar ul li  {
	margin: 0;
	padding: 0;
	border: 0;
	list-style: none;
	line-height: 1;
	display: block;
	position: relative;
}

.Pagina .sidebar {
	width: 220px;
	color: <?php echo MktColor::$Sub_Text; ?>
	float: left;
	margin-right: 15px;
}

.Pagina .sidebar ul ul {
	display: none;
}

.Pagina .sidebar > ul > li.active > ul {
	display: block;
}

.Pagina .align-right {
	float: right;
}

.Pagina .sidebar > ul > li > a {
	padding: 16px 22px;
	cursor: pointer;
	z-index: 2;
	text-decoration: none;
	color: <?php echo MktColor::$Sub_Text; ?>
	background: <?php echo MktColor::$Sub_Item; ?>
}

.Pagina .sidebar > ul > li > a:hover {
	color: <?php echo MktColor::$Sub_Text; ?>
	background-color: <?php echo MktColor::$Sub_Item_Hover; ?>
}

.Pagina .sidebar ul > li.has-sub > a:after {
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

.Pagina .sidebar ul > li.has-sub > a:before {
	position: absolute;
	right: 22px;
	top: 23px;
	display: block;
	width: 10px;
	height: 2px;
	background: <?php echo MktColor::$Sub_Item_Hover; ?>
	content: "";
}

.Pagina .sidebar ul > li.has-sub.open > a:after, .Pagina .sidebar ul > li.has-sub.open > a:before {
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
}

.Pagina .sidebar ul ul li a {
	padding: 8px 22px;
	cursor: pointer;
	z-index: 2;
	text-decoration: none;
	color: <?php echo MktColor::$Sub_Text; ?>
	background: <?php echo MktColor::$Sub_Item_Sub; ?>
}

.Pagina .sidebar ul ul ul li a {
	padding-left: 32px;
}

.Pagina .sidebar ul ul li a:hover {
	color: <?php echo MktColor::$Sub_Text; ?>
	background-color: <?php echo MktColor::$Sub_Item_Sub_Hover; ?>
}

.Pagina .sidebar ul ul > li.has-sub > a:after {
	top: 16px;
	right: 26px;
}

.Pagina .sidebar ul ul > li.has-sub > a:before {
	top: 20px;
}

.Pagina .ulSidebar p {
	display: inline;
}
