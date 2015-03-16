<?php
	// MktConfig is class om makkelijk van een plek de hele server variable te bedienen
	
	class MktConfig {
		
		// UTF van de website
		public static $utf = "UTF-8";
		// Hoort site bezocht te worden door robot's / zoek machines
		public static $robot = true;
		
		// Domein van de site, exclusief http
		public static $domein = "localhost";
		// De title van de site
		public static $title = "PHP Template No Config";
		// Description van de site, Meestal zichtbaar in zoekmachines
		public static $desc = "A local site that gets hosted some where else";
		// Zoek Keys, gebruikt in oude zoek machines en geavenceerde site beheer systemen
		public static $keys = array(
				"Nederland", "Localhost", "Template", 
				"MakerTim", "CMS", "Content", 
				"Beste Link 2015", "Responsive");
		
	}
?>