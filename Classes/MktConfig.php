<?php
	// MktConfig is class om makkelijk van een plek de hele server variable te bedienen
	
	class MktConfig {
		
		// UTF van de website
		public static $utf = 'UTF-8';
		// Hoort site bezocht te worden door robot's / zoek machines
		public static $robot = true;
		// Telt per pagina hoeveel pagina word bezocht
		public static $pageCount = true;
		// Telt hoeveel de site word bezocht
		public static $siteCount = true;
		// Telt hoeveel de site word bezocht in unieke bezoekers
		public static $siteUniqueCount = true;
		public static $siteUniqueIPCount = true;
		// Op basis van wat telt de unique counter?
		// Opties zijn: IP, COOKIE, SESSION
		public static $siteUniqueKey = 'COOKIE';
		
		// SocialMedia - Laat leeg voor geen knop
		public static $google = 'MakerTim';
		public static $facebook = 'https://www.facebook.com/MakerTimm';
		public static $twitter = 'MakerTim';
		public static $customButton = array( 
			'<img src="../../Pictures/Mail.png" alt="Nieuwsbrief" style="cursor: pointer;" class="Popup" data-page="../../Content/Extra/Nieuwsbrief.html" />',
		);
		
		// Domein van de site, exclusief http
		public static $domein = 'localhost';
		// Dir waar template in zit
		public static $rootDir = '/GIT/PHP-Template/';
		// Zoek Keys, gebruikt in oude zoek machines en geavenceerde site beheer systemen
		public static $keys = array(
				"Nederland", "Localhost", "Template", 
				"MakerTim", "CMS", "Content", 
				"Beste Link 2015", "Responsive");
		// Pagina footer text, variable zijn: {pageCount} {siteCount} {siteUniqueCount} {siteUniqueIPCount}
		public static $footerStats = '<p>Pagina bekeken {pageCount}, Site bezocht {siteCount}, Unieke bezoekers {siteUniqueCount}, Unieke IPs {siteUniqueIPCount}</p>';
		// De text dat in de footer van elke pagina komt!
		public static $footer = '<p>Hosted by <a href="http://www.xmlhosting.nl/">XMLHosting.nl</a> U kunt uw vakantie boeken bij:VakantieStunt & Duikreizen</p>';
	}
	
	class MktColor {
		// Gebruik alleen kleuren van http://html-color-codes.info/
		// Gebruik alleen 'rgba(255,255,255,1.0);'
		// Templates eventueel beschikbaar in /Templates/
		// rgba staat voor Rood, Groen, Blauw, Alpha
		// Een combinatie van de 3 kleuren maken alle kleuren mogelijk
		// Alpha is de transparantie van de kleur, 1 = niet transparant, 0 = 100% transparant, komma getal toegestaan
		
		// Algemeen
		public static $Lijntje = 					'rgba(90,  90,  90,   1.0);';
		public static $LijntjeDikte = 				'6px';
		
		// Menu
		public static $Menu_Text = 					'rgba(46,  46,  46,   1.0);';
		public static $Menu_Background = 			'rgba(192, 192, 192,  1.0);';
		public static $Menu_Outline = 				'rgba(74,  74,  74,   1.0);';
		public static $Menu_Highlight = 			'0.5;';
		
		// SubMenu
		public static $Sub_Text = 					'rgba(46,  46,  46,   1.0);';
		public static $Sub_Item = 					'rgba(192, 192, 192,  1.0);';
		public static $Sub_Item_Highlight = 		'rgba(90,  90,  90,   0.5);';
		public static $Sub_Item_Hover = 			'rgba(90,  90,  90,   1.0);';
		public static $Sub_Item_Sub = 				'rgba(222, 222, 222,  1.0);';
		public static $Sub_Item_Sub_Hover = 		'rgba(100, 100, 100,  1.0);';
		public static $Sub_Item_Border = 			'rgba(90,  90,  90,   1.0);';
		
		// Content
		public static $Markdown_Background = 		'rgba(222, 222, 222, 1.0);';
		public static $Markdown_Text = 				'rgba(51,  51,  51,  1.0);';
		public static $Markdown_Link = 				'rgba(65,  131, 196, 1.0);';
		public static $Markdown_Balk = 				'rgba(231, 231, 231, 1.0);';
		public static $Markdown_HeaderLine = 		'rgba(238, 238, 238, 1.0);';
		public static $Markdown_Highlight = 		'rgba(0,   0,   0,   0.2);';
		public static $Markdown_TableBorder = 		'rgba(215, 215, 215, 1.0);';
		public static $Markdown_TableBackground =	'rgba(245, 245, 245, 0.8);';
		public static $Markdown_TableBackground2 =	'rgba(245, 245, 245, 0.5);';
		
		// Footer
		public static $Footer_Text =				'rgba(51,  51,  51,  1.0);';
		public static $Footer_Link =				'rgba(227, 77,  44,  1.0);';
		public static $Footer_Background =			'rgba(192, 192, 192, 1.0);';
		
		// SocialMedia
		public static $Media_Background =			'rgba(222, 222, 222, 0.5);';
		
		// Cookie popup
		public static $Cookie_Text = 				'rgba(255, 255, 255, 1.0);';
		public static $Cookie_Background = 			'rgba(0,   0,   0,   0.7);';
		public static $Cookie_Button = 				'rgba(91,  183, 91,  1.0);';
	}
?>