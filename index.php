<?php
	include("/Classes/IncludeManager.php");
	$pageContent = MktPage::getPage();
?>
<!DOCTYPE html>
<html>
	<head>
<?php 
	echo Header::getMetaTags(); 
	echo Header::getDefaultHeader();
?>
	</head>

	<body>
		<!-- Starting Content -->
		<br />
		<div class="markdown-body">
<?php echo $pageContent->content; ?> 
		<div>
		<br />
		
		<!-- End Content -->
	</body>
</html>