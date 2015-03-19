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
		<div class="Pagina">
			<!-- Banner -->
			<?php
				if($pageContent->hasBanner == "true") {
					echo PHP_EOL .
					'<div class="Header">' . PHP_EOL . 
					'<img id="BannerSrc" src="Pictures/header.jpg" style=" position: fixed; left: 1px; top: 1px; width: 1px; height: 1px;" />' .
					'<canvas id="Banner"> </canvas>' .
					'</div>' . PHP_EOL;
				}
			?>
			<!-- End Banner -->
			
			<!-- Starting Main Menu-->
			<div class="Menu Rounded">
				<?php 
					echo $menu->PrintMenu();
				?>
			</div>
			<!-- End Main Menu -->
			
			<!-- Starting Side Bar-->
			<?php
				if($pageContent->hasSideBar == "true") {
					echo PHP_EOL .
					'<div class="sidebar Rounded">' . PHP_EOL .
					SideBar::createSidebar()->PrintBar() .
					'</div>';
				}
			?>
			<!-- End Side Bar-->
			
			<!-- Starting Content -->
			<div class="Content Rounded">
				<div class="markdown-body">
					<?php 
						echo $pageContent->errorMessage;
						echo $pageContent->content; 
					?>
				</div>
			</div>
			<!-- End Content -->
			
			<!-- Starting Footer -->
			<div class="Footer Rounded">
				<p><a href="http://www.aanbiedingcyprus.nl/">www.aanbiedingcyprus.nl</a> 2015 All rights reserved.</p>
				<p>Hosted by <a href="http://www.xmlhosting.nl/">XMLHosting.nl</a> U kunt uw vakantie boeken bij:VakantieStunt & Duikreizen</p>
			</div>
			<!-- End Footer -->
		</div>
	</body>
</html>
