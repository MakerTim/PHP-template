<?php
	class Counter {
		
		public static $siteCount = -1;
		public static $uniqueCount = -1;
		public static $thisPageCount = -1;
		private static $uniqueKey = "";
		
		public static function count($page = "") {
			if(!file_exists("ViewCounter")){
				mkdir("ViewCounter");
			}
			if(MktConfig::$siteUniqueCount) {
				Counter::$uniqueKey = str_replace(
					array('IP', 'COOKIE', 'SESSION'), 
					array($_SERVER['REMOTE_ADDR'], (array_key_exists('PHPSESSID', $_COOKIE)?$_COOKIE["PHPSESSID"]:"new"), session_id()), 
					MktConfig::$siteUniqueKey);
				Counter::countUnique();
			}
			if(MktConfig::$siteCount) {
				Counter::countTotal();
			}
			if(MktConfig::$pageCount) {
				Counter::pageTotal($page);
			}
		}
		
		private static function pageTotal($page) {
			if(!empty($page)) {
				$file = MktUtils::file(array('ViewCounter', 'page_' . $page->page . '.txt'));
				$File = file_get_contents($file);
				if($File !== false){
					$t = explode(PHP_EOL, $File);
					Counter::$thisPageCount = $t[0];
				} else {
					Counter::$thisPageCount = 0;
				}
				file_put_contents($file, ++Counter::$thisPageCount);
			}
		}
		
		private static function countTotal() {
			$file = MktUtils::file(array('ViewCounter', 'rawUsers.txt'));
			$File = file_get_contents($file);
			if($File !== false){
				$t = explode(PHP_EOL, $File);
				Counter::$siteCount = $t[0];
			} else {
				Counter::$siteCount = 0;
			}
			Counter::$siteCount += 1;
			file_put_contents($file, Counter::$siteCount);
		}
		
		private static function countUnique() {
			$file = MktUtils::file(array('ViewCounter', 'uniqueUsers.txt'));
			$File = file_get_contents($file);
			$hasBeenThere = false;
			Counter::$uniqueCount = -1;
			if($File !== false) {
				foreach(explode(PHP_EOL, $File) as $user) {
					if(htmlentities(Counter::$uniqueKey) == $user){
						$hasBeenThere = true;
					}
					Counter::$uniqueCount++;
				}
			} else {
				Counter::$uniqueCount = 1;
			}
			if(!$hasBeenThere) {
				file_put_contents($file, htmlentities(Counter::$uniqueKey) . PHP_EOL, FILE_APPEND);
			}
		}
		
		public static function loadStats($input) {
			return str_replace(
				array("{siteCount}", "{siteUniqueCount}", "{pageCount}"), 
				array(Counter::$siteCount, Counter::$uniqueCount, Counter::$thisPageCount), 
				$input
			);
		}
	}
?>