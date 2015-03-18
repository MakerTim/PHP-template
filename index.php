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
		<div class="Pagina">
			<?php
				if($pageContent->hasBanner == "true") {
					echo PHP_EOL .
					'<div class="Header">' . PHP_EOL . 
					'<img src="Pictures\header.jpg" />' . PHP_EOL .
					'</div>' . PHP_EOL;
				}
			?>
			
			<!-- Starting Main Menu-->
			<div class="Menu">
				<?php 
					echo $menu->PrintMenu();
				?>
			</div>
			<!-- End Main Menu -->
			
			<div class="SubMenu">	
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#news">News</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="#about">About</a></li>
				</ul>
			</div>
			
			<!-- Starting Content -->
			<div class="Content">
				<br />
				<div class="markdown-body">
					<?php 
						echo $pageContent->content; 
						echo $pageContent->errorMessage;
					?> 
				</div>
				<br />
			</div>
			<!-- End Content -->
			
			<div class="Footer" style="margin-top:20px; text-align:center;">
				www.aanbiedingcyprus.nl 2015 All rights reserved. Hosted by XMLHosting.nl U kunt uw vakantie boeken bij: VakantieStunt & Duikreizen
			</div>
		</div>
	</body>
</html>