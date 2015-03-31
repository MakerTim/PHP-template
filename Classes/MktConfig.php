<?php
	// MktConfig is class om makkelijk van een plek de hele server variable te bedienen
	
	class MktConfig {
		
		// UTF van de website
		public static $utf = "UTF-8";
		// Hoort site bezocht te worden door robot's / zoek machines
		public static $robot = true;
		// Telt per pagina hoeveel pagina word bezocht
		public static $pageCount = true;
		// Telt hoeveel de site word bezocht
		public static $siteCount = true;
		// Telt hoeveel de site word bezocht in unieke bezoekers
		public static $siteUniqueCount = true;
		// Op basis van wat telt de unique counter?
		// Opties zijn: IP, COOKIE, SESSION
		public static $siteUniqueKey = "COOKIE";
		
		// Domein van de site, exclusief http
		public static $domein = "localhost";
		// Dir waar template in zit
		public static $rootDir = "/GIT/PHP-Template/";
		// Zoek Keys, gebruikt in oude zoek machines en geavenceerde site beheer systemen
		public static $keys = array(
				"Nederland", "Localhost", "Template", 
				"MakerTim", "CMS", "Content", 
				"Beste Link 2015", "Responsive");
		// Pagina footer text, variable zijn: {pageCount} {siteCount} {siteUniqueCount}
		public static $footerStats = '<p>Pagina aantal keer bekeken:{pageCount}, Site bezocht:{siteCount}, waarvan unieke bezoekers:{siteUniqueCount}</p>';
		// De text dat in de footer van elke pagina komt!
		public static $footer = '<p>Hosted by <a href="http://www.xmlhosting.nl/">XMLHosting.nl</a> U kunt uw vakantie boeken bij:VakantieStunt & Duikreizen</p>';
	}
?>