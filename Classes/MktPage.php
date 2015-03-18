<?php
	// De Class wat de flatfiles linked aan de web interface
	// handeld ook  MarkDown af
	
	// Zie map /Content/Pages/ voor alle paginas
	
	class MktPage {
		var $page;
		var $content;
		var $errorMessage;
		
		var $menuEntry;
		var $hasBanner;
		var $hasSubMenu;
		
		public function __construct($type = "page", $page = "index") {
			$this->page = str_replace(".", "", $page);
			$this->errorMessage = "";
			if($type == "page"){
				$this->loadPage();
			}
		}
		
		private function loadPage() {
			if(!file_exists('./Content/Pages/' . $this->page . '.xml')) {
				$this->page = "404";
			}
			libxml_use_internal_errors(true);
			$xml = file_get_contents("./Content/Pages/" . $this->page . '.xml');
			$xml = str_replace("&", "\\quot\\", $xml);
			$xml = simplexml_load_string($xml);
			$xmlError = libxml_get_errors();
			foreach($xmlError as $error) {
				$this->errorMessage .= '<div class="error"><b>XML ERROR:</b> <br /> File: ' . $this->page . 
							'.xml <br /> &nbsp;&nbsp;at line ' . $error->line . ' (' . $error->message . ')<br /></div>';
			}
			libxml_clear_errors();
			if(!is_null($xmlError) && sizeof($xmlError) == 0) {
				$this->menuEntry = (string)$xml->Menu->Index;
				$this->hasBanner = (string)$xml->Menu->Banner;
				$this->hasSubMenu = (string)$xml->Menu->SubMenu;
				$this->content = $GLOBALS["md"]->text(str_replace("\\quot\\", "&", $xml->Md));
			}
		}
		
		public static function getPage() {
			$page = "";
			$type = "";
			if(!is_null($_GET) && sizeof($_GET) > 0) {
				if(array_key_exists("page", $_GET)){
					$page = $_GET['page'];
					$type = "page";
				}
				if(array_key_exists("404", $_GET)){
					$page = $_GET['404'];
					$type = "404";
				}
			}
			if($type == "404") {
				header("Location: " . MktUtils::getRoot() . "/Page/404/");
			} else if(empty($page) || empty($type)){
				header("Location: " . MktUtils::getRoot() . "/Page/index/");
				exit;
			}
			return new MktPage($type, $page);
		}
	}
?>