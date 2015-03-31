# How to
---
**MktConfig:**


**Pagina aanmaken:**  
1. Open Content map.  
2. Open Pages map.  
3. Kopier index.xml
4. Hernoem hem (naam van pagina)  
5. Open het bestand.  
6. Verander bij INDEX pagina naam.   
7. Kies voor banner ja of nee.  
8a. Kies voor submenu ja of nee.  
8b. Als submenu ja voeg < Sub >Submenu naam< /Sub > toe.  
9. Opslaan.  

**Menu item aanmaken:**  
1. Open Content map.  
2. Open MainMenu map.  
3. Kopier home.xml
4. Hernoem hem (naam van menu item)  
5. Open het bestand.  
6. Verander bij NAME menu naam.  
7. Verander alt.   
8. Verander <%root%/Page/Index/ in <%root%/Page/(naam van de pagina)/.  
9. Stel Priority in (de hoogste komt aan de linker kant).  
10. Opslaan.

**Iframe maken:**  
**Iframe:** Venster in een webpagina om informatie van een andere pagina in te laden. (zoals youtube filmpje of offerte). 

Om een Iframe te maken vul je de onderstaande code in (op de plek waar je hem wilt hebben).    
**{ $link[ =$width x$height][ ~$border]**  

**{$link}** 				= hierkomt de link van je iframe testaan.  
**[ =$width x$height]**  	= hier vul je de breedte en hoogte van je iframe in.  
**[ ~$border]** 			= hier vul je de border dikte in.  


|**Voorbeeld:**  					   	   | **Uitleg:**  																|
|------------------------------------------|----------------------------------------------------------------------------|
| **{https://www.google.nl/}**             | = Dit zorgt voor een iframe.                                               |
| **{https://www.google.nl/ =200x200}**    | = Dit zorgt voor een iframe met aangepaste hoogte en breedte.              |
| **{https://www.google.nl/ =200x200 ~0}** | = Dit zorgt voor een iframe met aangepaste hoogte en breedte & een border. |
| **{https://www.google.nl/ ~0}**          | = Dit zorgt voor een iframe met  een border.                               |                            
 
**Counter waarde aanpassen:**  
Om de counter aan te passen voer je de volgende handelingen uit:  
1. Open ViewCounter map.  
	* je ziet nu alle counter bestanden  
2. Kies de counter welke je wilt aanpassen (pagina)  
3. Open dit bestand.  
	* je ziet nu een getal (dit is het aantal bezoekers)   
4. Pas dit getal aan (naar het getal wat je wilt hebben)  
5. Opslaan.

**Css aanpassen:**  
Als je de css bestanden wilt aanpassen kijk dan goed of je de juiste aanpast. (allen doen als je over de juiste kennis beschikt)  
1. **cookie:** In dit bestand kan je het uiterlijk van de cookie popup aanpassen.  
2. **markdown:** In dit bestand kan je de Markdown style aanpassen (liever deze niet aanpassen)   
3. **mobiel:** In dit bestand kan je het uiterlijk van de mobiele weergave aanpassen.   
4. **style:**  In dit bestand kan je het uiterlijk van de desktop weergave aanpassen.  
5. **SubMenuStyle:**  In dit bestand kan je het uiterlijk van het submenu aanpassen.  
6. **SubMenuStyleMobiel:**  In dit bestand kan je het uiterlijk van het submenu van de mobiele weergave aanpassen.  


© Copyright 2015 MakerTim