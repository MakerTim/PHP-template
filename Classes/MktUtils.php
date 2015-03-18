<?php
	class MktUtils {
		public static function getRoot(){
			$rawUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if((preg_match("((\/Page\/)|(\/page\/)|(\/Pages\/)|(\/pages\/))", 
					$rawUrl) == 1)) {
				$ret = "..";
			} else {
				$ret = ".";
			}
			if((preg_match("(/$)", $rawUrl) == 1)) {
				$ret .= "/..";
			}
			return $ret;
		}
	}
?>