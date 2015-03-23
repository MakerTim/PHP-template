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
	echo Header::endScripts();
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
			
			<!-- Starting Footer -->
			<div class="Footer TopBorder RoundedBottom">
				<p><a href="http://www.aanbiedingcyprus.nl/">www.aanbiedingcyprus.nl</a> 2015 All rights reserved.</p>
				<p>Hosted by <a href="http://www.xmlhosting.nl/">XMLHosting.nl</a> U kunt uw vakantie boeken bij:VakantieStunt & Duikreizen</p>
			</div>
			<!-- End Footer -->
		</div>
	</body>
</html>
