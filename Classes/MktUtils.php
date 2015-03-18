<?php
	class MktUtils {
		public static function getRoot(){
			return substr_replace("http://$_SERVER[HTTP_HOST]" . MktConfig::$rootDir, "", -1);
		}
		
		public static function rootString($ret){
			return str_replace("%root%", MktUtils::getRoot(), $ret);
		}
	}
?>