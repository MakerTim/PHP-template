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
			
			<div id='cssmenu'>
				<ul>
				   <li><a href='#'>Home</a></li>
				   <li class='active has-sub'><a href='#'>Item 1 </a>
					  <ul>
						 <li><a href='#'>Product 1</a>
						 </li>
						 <li><a href='#'>Product 2</a>
						 </li>
					  </ul>
				   </li>
				   <li class='active has-sub'><a href='#'>Item 2</a>
					  <ul>
						 <li><a href='#'>Product 1</a>
						 </li>
						 <li><a href='#'>Product 2</a>
						 </li>
					  </ul>
				   </li>
				   <li><a href='#'>Item 3</a></li>
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
			
			<div class="Footer">
				<div style="margin-top:20px; text-align:center;">
					www.aanbiedingcyprus.nl 2015 All rights reserved. Hosted by XMLHosting.nl U kunt uw vakantie boeken bij: VakantieStunt & Duikreizen
				</div>	
			</div>
		</div>
	</body>
</html>
