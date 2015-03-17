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
		<?php echo $pageContent->content; ?> 
		<br />
		
		<!-- End Content -->
	</body>
</html>