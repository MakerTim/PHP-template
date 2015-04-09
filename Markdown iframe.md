**Iframe maken:**  
**Iframe:** Venster in een webpagina om informatie van een andere pagina in te laden. (zoals youtube filmpje of offerte). 

Om een Iframe te maken vul je de onderstaande code in (op de plek waar je hem wilt hebben).    
**{ $link[ =$width [x$height]][ ~$border]**  

**{$link}** 				= hierkomt de link van je iframe testaan.  
**[ =$width [x$height]]**  	= hier vul je de breedte en hoogte van je iframe in.  
**[ ~$border]** 			= hier vul je de border dikte in.  


|**Voorbeeld:**  					   	   | **Uitleg:**  																|
|------------------------------------------|----------------------------------------------------------------------------|
| **{https://www.google.nl/}**             | = Dit zorgt voor een iframe.                                               |
| **{https://www.google.nl/ =200}**    	   | = Dit zorgt voor een iframe met aangepaste hoogte. (breedte = 100%)        |
| **{https://www.google.nl/ =200x200}**    | = Dit zorgt voor een iframe met aangepaste hoogte en breedte.              |
| **{https://www.google.nl/ =200x200 ~0}** | = Dit zorgt voor een iframe met aangepaste hoogte en breedte & een border. |
| **{https://www.google.nl/ ~0}**          | = Dit zorgt voor een iframe met  een border.                               |    

© Copyright 2015 MakerTim               