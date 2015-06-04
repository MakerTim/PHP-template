<?php
	function refreshSiteMap() {
		$filename = './sitemap.xml';
		if(file_exists($filename) && 
				((time() - filemtime($filename)) / (60 * 60 * 24)) < 1) {
			return;
		}
		preg_match('/ErrorDocument 404[\s!-~\n]*?index\.php\?404=404/', 
			trim(file_get_contents('.htaccess')), $found);
		$page = str_replace(array('ErrorDocument 404 ', 'index.php?404=404'), '', $found[0]);
		$data = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
		$data .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" '.
				'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
				'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 '.
				'http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
		$data .= '  <!-- Created on ' . date("Y-m-d") . ' -->' . PHP_EOL;
		foreach(scandir(MktUtils::file(array('.', 'Content', 'Pages'))) as $file) {
			if($file[0] == '.' || $file == 'index.html') {
				continue;
			}
			$File = $file;
			$file = preg_replace('/\\.[^.\\s]{3,}$/', '', $file);
			$data .= '  <url>' . PHP_EOL;
			$data .= '    <loc>http://' . MktConfig::$domein . "$page$file/" . '</loc>' . PHP_EOL;
			$data .= '    <lastmod>' . date("Y-m-d", filemtime("./Content/Pages/$File")) . '</lastmod>' . PHP_EOL;
			if($file == 404) {
				$data .= '    <priority>0.10</priority>' . PHP_EOL;
			} elseif($file == 'index' || $file == 'Index') {
				$data .= '    <priority>1.00</priority>' . PHP_EOL;
			} else {
				$data .= '    <priority>0.80</priority>' . PHP_EOL;
			}
			$data .= '  </url>' . PHP_EOL;
		}
		$data .= '</urlset>' . PHP_EOL;
		file_put_contents($filename, $data);
	}
?>