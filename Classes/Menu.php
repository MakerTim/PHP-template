<?php
	// De Class Menu word de opmaak van Menu gebouwd,
	// Deze word met behulp van Javascript, jQuarry, Bootstrap opgebouwd
	
	// Main doel van de class is om makkelijk de where i am te highlighten 
	// En op een CMS manier het menu op bouwen
	function cmp($a, $b) {
		return  $b->prio - $a->prio;
	}
	
	class Menu {
		
		var $items;
		
		public function __construct($menuLocation) {
			$this->items = array();
			$this->loadMenu($menuLocation);
		}
		
		private function loadMenu($menuLocation) {
			foreach(scandir($menuLocation) as $file) {
				if($file == "." || $file == "..") {
					continue;
				}
				array_push($this->items, new MenuItem(MktUtils::file(array($menuLocation ,$file))));
			}
			usort($this->items, "cmp");
		}
		
		public function getAmount() {
			return count($this->items);
		}
		
		public function printMenu() {
			$ret = PHP_EOL . '<ul class="ulMainMenu">' . PHP_EOL
			. '<li class="menuImg"> <img src="Pictures/menu.svg" alt="" /> </li>' . PHP_EOL;
			foreach($this->items as $menuEntry) {
				$ret .= '<li class="menuItem" id="Menu_' . $menuEntry->name . '">';
				$ret .= '<a href="' . $menuEntry->href . '">' . $menuEntry->name . '</a>';
				$ret .= '</li>' . PHP_EOL;
			}
			$ret .= '</ul>' . PHP_EOL;
			return $ret;
		}
		
		public static function getMainMenu($MktPage){
			return new Menu(MktUtils::file(array('.', 'Content', 'MainMenu')));
		}
	}
	class MenuItem {
		
		var $uuid;
		var $name;
		var $alt;
		var $href;
		var $prio;
		var $errorMessage;
		
		public function __construct($FileLocation) {
			$errorMessage = "";
			libxml_use_internal_errors(true);
			$xml = file_get_contents($FileLocation);
			$xml = str_replace("&", "\\quot\\", $xml);
			$xml = simplexml_load_string($xml);
			$xmlError = libxml_get_errors();
			foreach($xmlError as $error) {
				$this->errorMessage .= '<div class="error"><b>XML ERROR:</b> <br /> File: ' . $FileLocation . 
							'.xml <br /> &nbsp;&nbsp;at line ' . $error->line . ' (' . $error->message . ')<br /></div>';
			}
			libxml_clear_errors();
			if(!is_null($xmlError) && sizeof($xmlError) == 0) {
				$this->uuid = $this->uuid[0];
				$this->name = (string)$xml->Name;
				$this->alt = (string)$xml->Alt;
				$this->href = MktUtils::rootString((string)$xml->Href);
				$this->prio = (string)$xml->Priority;
			}
		}	
	}
	
	class SideBar {
		
		var $options;
		var $hasError;
		
		public function __construct($name) {
			$this->options = array();
			$this->hasError = false;
			$this->loadSidebar($name);
		}
		
		private function loadSidebar($name) {
			$errorMessage = "";
			libxml_use_internal_errors(true);
			try{
				if(!file_exists(MktUtils::file(array('.', 'Content', 'SideBar', "$name.xml")))){
					throw new Exception('Sidebar not found');
				}
				$xml = file_get_contents(MktUtils::file(array('.', 'Content', 'SideBar', "$name.xml")));
				$xml = str_replace("&", "\\quot\\", $xml);
				$xml = simplexml_load_string($xml);
				$xmlError = libxml_get_errors();
				foreach($xmlError as $error) {
					$this->errorMessage .= '<div class="error"><b>XML ERROR:</b> <br /> File: ' . $this->page . 
								'.xml <br /> &nbsp;&nbsp;at line ' . $error->line . ' (' . $error->message . ')<br /></div>';
				}
				libxml_clear_errors();
				if(!is_null($xmlError) && sizeof($xmlError) == 0) {
					foreach($xml->Option as $option) {
						array_push($this->options, new SideBarItem($option));
					}
				}
			} catch(Exception $ex) { 
				$this->hasError = true;
			}
		}
		
		public function PrintBar() {
			$ret = '<ul class="ulSidebar">' . PHP_EOL;
			$first = current($this->options);
			$end = end($this->options);
			foreach($this->options as $option) {
				$hasSub = $option->hasSub == "true";
				$isOpen = $option->isOpen == "true";
				$ret .= '<li '. ($hasSub? ($isOpen? 'class="active has-sub open"' : 'class="has-sub"') : '') . '>' . PHP_EOL .
				'<a href=' . $option->href . '>' 
					. $option->name . '</a>' . PHP_EOL;
				if($hasSub) {
					$ret .= '<ul>';
					foreach($option->subs as $sub) {
						$ret .= '<li>';
						$ret .= '<a href="' . $sub->href . '">' . $sub->name . '</a>';
						$ret .= '</li>';
					}
					$ret .= '</ul>';
				}
				$ret .= '</li>' . PHP_EOL;
			}
			$ret .= '</ul>';
			return $ret;
		}
		
		public static function createSidebar($name) {
			return new SideBar($name);
		}
	}	
	class SideBarItem {
		
		var $name;
		var $href;
		var $hasSub;
		var $isOpen;
		var $subs;
		
		public function __construct($xmlOption) {
			$this->name = $GLOBALS["md"]->text($xmlOption->Name);
			$this->href = $xmlOption->Href;
			$this->hasSub = $xmlOption->HasSub;
			if($this->hasSub == "true") {
				$this->isOpen = $xmlOption->IsOpen;
				$this->subs = array();
				foreach($xmlOption->Sub as $sub){
					array_push($this->subs, new SideBarSubItem($sub));
				}
			}
		}
	}
	class SideBarSubItem {
		
		var $name;
		var $href;
		
		public function __construct($xmlSub) {
			$this->name = $GLOBALS["md"]->text($xmlSub->Name);
			$this->href = $xmlSub->Href;
		}
	}
?>