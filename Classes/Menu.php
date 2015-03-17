<?php
	// De Class Menu word de opmaak van Menu gebouwd,
	// Deze word met behulp van Javascript, jQuarry, Bootstrap opgebouwd
	
	// Main doel van de class is om makkelijk de where i am te highlighten 
	// En op een CMS manier het menu op bouwen
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
				array_push($this->items, new MenuItem($menuLocation . "/" . $file));
			}
			usort($this->items, "cmp");
		}
		
		public function getAmount() {
			return count($this->items);
		}
		
		public function printMenu() {
			echo PHP_EOL . '<ul>' . PHP_EOL;
			foreach($this->items as $menuEntry) {
				echo '<li>';
				echo '<a href="' . $menuEntry->href . '">' . $menuEntry->name . '</a>';
				echo '</li>' . PHP_EOL;
			}
			echo '</ul>' . PHP_EOL;
		}
		
		public static function getMainMenu($MktPage){
			return new Menu("./Content/MainMenu");;
		}
	}
	
	function cmp($a, $b) {
		return $a->prio - $b->prio;
	}
	
	class MenuItem {
		
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
				$this->errorMessage .= '<div class="error"><b>XML ERROR:</b> <br /> File: ' . $this->page . 
							'.xml <br /> &nbsp;&nbsp;at line ' . $error->line . ' (' . $error->message . ')<br /></div>';
			}
			libxml_clear_errors();
			if(!is_null($xmlError) && sizeof($xmlError) == 0) {
				$this->name = (string)$xml->Name;
				$this->alt = (string)$xml->Alt;
				$this->href = (string)$xml->Href;
				$this->prio = (string)$xml->Priority;
			}
		}	
	}
?>