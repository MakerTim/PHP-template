<?php
	include("/Classes/IncludeManager.php");
	$pageContent = MktPage::getPage();
?>
<!DOCTYPE html>
<html>
	<head>
<?php echo Header::getMetaTags(); ?>
	</head>

	<body>
		<!-- Starting Content -->
		<br />
		<?php var_dump($pageContent); ?> 
		<br />
		
		<!-- End Content -->
	</body>
</html>