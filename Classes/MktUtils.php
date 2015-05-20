<?php
	class MktUtils {
		public static function getRoot() {
			return substr_replace("http://$_SERVER[HTTP_HOST]" . MktConfig::$rootDir, '', -1);
		}
		
		public static function rootString($ret) {
			return str_replace('%root%', MktUtils::getRoot(), $ret);
		}
		
		public static function file($ArrayPathToFile) {
			return join(DIRECTORY_SEPARATOR, $ArrayPathToFile);
		}
		
		public static function htmlsymbols($toReplace, $LTGT = false, $qout = false, $undo = false) {
			if($LTGT) {
				$toReplace = str_replace(array("<", ">"), array("&lt;", "&gt;"), $toReplace);
			}
			if($qout) {
				$toReplace = str_replace(array("\"", "'"), array("&quot;", "&#39;"), $toReplace);
			}
			$find = array("&", "¡", "¢", "£", "¤", "¥", "¦", "§", "¨", 
					"©", "ª", "«", "¬", "®", "¯", "°", "±", "²", "³", "´", "µ", "¶", "·", "¸", 
					"¹", "º", "»", "¼", "½", "¾", "¿", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", 
					"È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï", "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", 
					"×", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "Þ", "ß", "à", "á", "â", "ã", "ä", "å", 
					"æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï", "ð", "ñ", "ò", "ó", "ô", 
					"õ", "ö", "÷", "ø", "ù", "ú", "û", "ü", "ý", "þ", "ÿ", "Œ", "œ", "Š", "š", 
					"Ÿ", "ƒ", "–", "—", "‘", "’", "‚", "“", "”", "„", "†", "‡", "•", "…", "‰", 
					"€", "™");
			$for = array("&amp;", "&iexcl;", "&cent;", "&pound;", 
					"&curren;", "&yen;", "&brvbar;", "&sect;", "&uml;", "&copy;", "&ordf;", "&laquo;", 
					"&not;", "&shy;", "&reg;", "&macr;", "&deg;", "&plusmn;", "&sup2;", "&sup3;", "&acute;", 
					"&micro;", "&para;", "&middot;", "&cedil;", "&sup1;", "&ordm;", "&raquo;", "&frac14;", 
					"&frac12;", "&frac34;", "&iquest;", "&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", 
					"&Auml;", "&Aring;", "&AElig;", "&Ccedil;", "&Egrave;", "&Eacute;", "&Ecirc;", "&Euml;",
					"&Igrave;", "&Iacute;", "&Icirc;", "&Iuml;", "&ETH;", "&Ntilde;", "&Ograve;", "&Oacute;", 
					"&Ocirc;", "&Otilde;", "&Ouml;", "&times;", "&Oslash;", "&Ugrave;", "&Uacute;", "&Ucirc;", 
					"&Uuml;", "&Yacute;", "&THORN;", "&szlig;", "&agrave;", "&aacute;", "&acirc;", "&atilde;", 
					"&auml;", "&aring;", "&aelig;", "&ccedil;", "&egrave;", "&eacute;", "&ecirc;", "&euml;", 
					"&igrave;", "&iacute;", "&icirc;", "&iuml;", "&eth;", "&ntilde;", "&ograve;", "&oacute;", 
					"&ocirc;", "&otilde;", "&ouml;", "&divide;", "&oslash;", "&ugrave;", "&uacute;", "&ucirc;", 
					"&uuml;", "&yacute;", "&thorn;", "&yuml;", "&#338;", "&#339;", "&#352;", "&#353;", "&#376;", 
					"&#402;", "&#8211;", "&#8212;", "&#8216;", "&#8217;", "&#8218;", "&#8220;", "&#8221;", "&#8222;", 
					"&#8224;", "&#8225;", "&#8226;", "&#8230;", "&#8240;", "&euro;", "&#8482;");
			return str_replace(($undo?$for:$find), ($undo?$find:$for), $toReplace);
		}
	}
?>