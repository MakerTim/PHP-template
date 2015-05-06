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
		var $sub;
		var $SubIndex;
		var $Title;
		
		public function __construct($type = 'page', $page = 'Index') {
			$this->page = str_replace(array('.', ' '), array('', '-'), $page);
			$this->errorMessage = '';
			if($type == 'page'){
				$this->loadPage();
			}
		}
		
		public function getTitle() {
			if(isset($this->Title) && !empty($this->Title)) {
				return $this->Title;
			}
			return $this->page . ' - ' . MktConfig::$domein;
		}
		
		private function loadPage() {
			if(!file_exists(MktUtils::file(array('.', 'Content', 'Pages', $this->page . '.xml')))) {
				$this->page = '404';
			}
			libxml_use_internal_errors(true);
			$xml = file_get_contents(MktUtils::file(array('.', 'Content', 'Pages', $this->page . '.xml')));
			$xml = str_replace('&', '\\quot\\', $xml);
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
				$this->Title = (string)$xml->Menu->Title;
				$this->sub = (string)$xml->Menu->Sub;
				$this->SubIndex = (string)$xml->Menu->SubIndex;
				$this->content = $GLOBALS['md']->text(str_replace('\\quot\\', '&', $xml->Md));
			} else {
				echo $this->errorMessage;
			}
		}
		
		public static function getPage() {
			$page = '';
			$type = '';
			if(!is_null($_GET) && sizeof($_GET) > 0) {
				if(array_key_exists('page', $_GET)){
					$page = $_GET['page'];
					$type = 'page';
				}
				if(array_key_exists('404', $_GET)){
					$page = $_GET['404'];
					$type = '404';
				}
			}
			if($type == '404') {
				header('Location: ' . MktUtils::getRoot() . '/Page/404/');
			} else if(empty($page) || empty($type)){
				header('Location: ' . MktUtils::getRoot() . '/Page/Index/');
				exit;
			}
			return new MktPage($type, $page);
		}
		
		public static function buildSocialBanner() {
			$ret = '<div class="SocialMedia">';
			foreach(MktConfig::$customButton as $sub){
				$ret .= '<div class="sub"><div class="tweet" style="max-height: 20px; height: 20px;">' . $sub . '</div></div>';
			}
			if(!empty(MktConfig::$facebook)){
				$ret .= '<div class="sub"><div class="tweet"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com/vakantiestunt/&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=80" class="socialm" style="border:none; overflow:hidden; width:85px; height:20px;"> </iframe></div></div>';
			}
			if(!empty(MktConfig::$google)){
				$ret .= '<div class="sub"><div class="tweet"><div class="g-plusone" data-annotation="none" data-size="medium" data-href="https://plus.google.com/+' . MktConfig::$google . '/posts"></div></div></div>';
			}
			if(!empty(MktConfig::$twitter)){
				$ret .= '<div class="sub"><div class="tweet"><a href="https://twitter.com/share" class="twitter-share-button" data-via="' . MktConfig::$twitter . '" data-count="none" data-dnt="true">Tweet</a></div></div>';
			}
			$ret .= '</div>';			
			return $ret;
		}
	}
?>