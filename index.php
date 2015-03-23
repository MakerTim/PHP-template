<?php
	include("/Classes/IncludeManager.php");
	$pageContent = MktPage::getPage();
	$menu = Menu::getMainMenu($pageContent);
?>
<!DOCTYPE html>
<html>
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
			<!-- Banner -->
			<?php
				if($pageContent->hasBanner == "true") {
					echo PHP_EOL .
					'<div class="Header">' . PHP_EOL . 
					'<img id="BannerSrc" src="Pictures/header.jpg" style=" position: fixed; left: 1px; top: 1px; width: 1px; height: 1px;" />' .
					'<canvas id="Banner" class="RoundedTop"> </canvas>' .
					'</div>' . PHP_EOL;
				}
			?>
			<!-- End Banner -->
			
			<!-- Starting Main Menu-->
			<div class="Menu TopBorder">
				<?php 
					echo $menu->PrintMenu();
				?>
			</div>
			<!-- End Main Menu -->
			
			<!-- Starting Side Bar-->
			<?php
				if($pageContent->hasSideBar == "true") {
					$SIDEBAR = SideBar::createSidebar($pageContent->Sub);
					if(!$SIDEBAR->hasError){
						echo PHP_EOL .
						'<div class="sidebar TopBorder">' . PHP_EOL .
						'
						<div class="MenuButton RoundedTop RoundedBottom"> <img src="Pictures/menu.png" /> </div>' . PHP_EOL .
						$SIDEBAR->PrintBar() .
						'</div>';
					} else {
						echo PHP_EOL .
						'<div class="sidebar"> </div>' . PHP_EOL;
					}
				}
			?>
			<!-- End Side Bar-->
			
			<!-- Starting Content -->
			<div class="Content TopBorder">
				<div class="markdown-body">
					<?php 
						echo $pageContent->errorMessage;
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
				<div id="accept"> Accepteer </div>
				<div id="policy"> Cookie Policy </div>
			</div>
			<!-- End Cookie Popup -->
			
			<!-- Starting Footer -->
			<div class="Footer TopBorder RoundedBottom">
				<div class="markdown-body">
					<?php 
						echo '<p><a href="http://'. MKTConfig::$domein. MKTConfig::$rootDir .'">'. MKTConfig::$domein .'</a> 2015 All rights reserved.</p>';
						echo MKTConfig::$footer;
					?>
				</div>
			</div>
			<!-- End Footer -->
		</div>
	</body>
</html>
