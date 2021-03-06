<?php
	//error_reporting(E_ERROR & E_PARSE);
	
	$seconds_to_cache = 1209600; // Two Weeks
	$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
	header("Expires: $ts");
	header("Pragma: cache");
	header("Cache-Control: max-age=$seconds_to_cache");
	
	require(join(DIRECTORY_SEPARATOR, array('.', 'Classes', 'IncludeManager.php')));
	if(strpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '&') !== false) {
		header('Location: ' . str_replace('&', '-', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
	}
	$pageContent = MktPage::getPage();
	Counter::Count($pageContent);
	$menu = Menu::getMainMenu($pageContent);
	refreshSiteMap();
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
<?php 
	echo Header::getMetaTags(); 
	echo Header::phpToJS($pageContent, $menu);
	echo Header::getDefaultHeader();
?>
	</head>

	<body>
		<?php 
			echo '<div id="Pagina" class="' . ($GLOBALS["mob"]->isMobile() ? "Mobiel" : "Pagina") . '">';
		?>
			<!-- FB default script -->
			<div id="fb-root"> </div>
			<!-- end FB -->
		
			<!-- Banner -->
			<?php
				if($pageContent->hasBanner == "true") {
					echo PHP_EOL .
					'<div class="Header">' . PHP_EOL . 
					'<img id="BannerSrc" alt="header" src="Pictures/header.jpg" style=" position: fixed; left: 1px; top: 1px; width: 1px; height: 1px;" />' .
					'<canvas id="Banner" class="RoundedTop"> </canvas>' . PHP_EOL .
					MktPage::buildSocialBanner() .
					'</div>' . PHP_EOL;
				}
			?>
			<!-- End Banner -->
			
			<div id="Errnor" style="color:LightCoral"></div>
			
			<!-- Starting Main Menu-->
			<div class="Menu TopBorder">
				<?php 
					echo $menu->PrintMenu();
				?>
			</div>
			<!-- End Main Menu -->
			
			<!-- Starting Side Bar-->
			<?php
				if(isset($pageContent->sub) && !empty($pageContent->sub)) {
					$SIDEBAR = SideBar::createSidebar($pageContent->sub);
					if(!$SIDEBAR->hasError){
						echo PHP_EOL . '<div class="sidebar TopBorder">' . PHP_EOL .
						'<div class="MenuButton"> <img src="Pictures/menu.svg" alt="menu" /> </div>' . PHP_EOL .
						$SIDEBAR->PrintBar() . '</div>';
					} else {
						echo PHP_EOL . '<div class="sidebar"> </div>' . PHP_EOL;
					}
				}
			?>
			<!-- End Side Bar-->
			
			<!-- Starting Content -->
			<div class="Content TopBorder">
				<div class="ContentButtons">
					<img class="contentbuddon" id="download" onClick="onDownload();" src="Pictures/icon-download.png" alt="download" />
					<img class="contentbuddon" id="mail" onClick="onMail();" src="Pictures/icon-mail.png" alt="mail" />
					<img class="contentbuddon" id="print" onClick="onPrint();" src="Pictures/icon-print.png" alt="print" />
				</div>
				<div class="markdown-body">
					<?php 
						echo $pageContent->content; 
					?>
				</div>
			</div>
			<!-- End Content -->
			
			<!-- Start Cookie Popup -->
			<div class="CookiePopup">
				<h4>
					Deze website gebruikt cookies
				</h4>
				<p> Deze website gebruikt cookies om te functioneren en de gebruikers ervaring te kunnen te verbeteren. 
				Door verder gebruik te maken van deze website accepteer je dat we cookies gebruiken naar onze Cookie Policy.</p>
				<div class="button" id="accept" style="float: left; "> Accepteer </div>
				<div class="button" id="policy" style="float: right; "> Cookie Policy </div>
			</div>
			<!-- End Cookie Popup -->
			
			<!-- Starting Footer -->
			<div class="Footer TopBorder RoundedBottom">
				<div class="markdown-body">
					<?php 
						echo Counter::loadStats(MKTConfig::$footerStats) . PHP_EOL;
						echo '<p><a href="http://'. MKTConfig::$domein. MKTConfig::$rootDir .'" rel="nofollow">'. MKTConfig::$domein .'</a> 2015 All rights reserved.</p>';
						echo MKTConfig::$footer;
					?>
				</div>
			</div>
			<!-- End Footer -->
<!-- <?php echo 'PHP versie ' . phpversion() . ' on ' . PHP_OS; ?> -->
<!-- https://github.com/MakerTim/PHP-template -->
		</div>
	</body>
</html>