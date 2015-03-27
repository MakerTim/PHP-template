<?php
	class Counter {
		
		public static $siteCount = -1;
		public static $uniqueCount = -1;
		public static $thisPageCount = -1;
		
		public static function count($page = "") {
			mkdir("ViewCounter");
			if(MktConfig::$siteUniqueCount) {
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
					Counter::$thisPageCount = explode(PHP_EOL, $File)[0];
				} else {
					++Counter::$thisPageCount;
				}
				file_put_contents($file, ++Counter::$thisPageCount);
			}
		}
		
		private static function countTotal() {
			$file = MktUtils::file(array('ViewCounter', 'rawUsers.txt'));
			$File = file_get_contents($file);
			if($File !== false){
				Counter::$siteCount = explode(PHP_EOL, $File)[0];
			} else {
				++Counter::$siteCount;
			}
			file_put_contents($file, ++Counter::$siteCount);
		}
		
		private static function countUnique() {
			$file = MktUtils::file(array('ViewCounter', 'uniqueUsers.txt'));
			$File = file_get_contents($file);
			$hasBeenThere = false;
			Counter::$uniqueCount = -1;
			if($File !== false) {
				foreach(explode(PHP_EOL, $File) as $user) {
					if($_COOKIE["PHPSESSID"] == $user){
						$hasBeenThere = true;
					}
					Counter::$uniqueCount++;
				}
			} else {
				Counter::$uniqueCount = 1;
			}
			if(!$hasBeenThere) {
				file_put_contents($file, $_COOKIE["PHPSESSID"] . PHP_EOL, FILE_APPEND);
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