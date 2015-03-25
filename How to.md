# How to
---
**MktConfig:**


**Pagina aanmaken:**  
1. Open content map.  
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
1. Open content map.  
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
Om een Iframe te maken vul je de onderstaande code in (op de plek waar je hem wilt hebben).  
{$link[ =$width x$height][ ~$border]}


**Voorbeeld:**  
| **{http://makertim.nl}**             | = Dit zorgt voor een iframe.                                               |
|--------------------------------------|----------------------------------------------------------------------------|
| **{http://makertim.nl =200x200}**    | = Dit zorgt voor een iframe met aangepaste hoogte en breedte.              |
| **{http://makertim.nl =200x200 ~0}** | = Dit zorgt voor een iframe met aangepaste hoogte en breedte & een border. |
| **{http://makertim.nl ~0}**          | = Dit zorgt voor een iframe met  een border.                               |
 
© Copyright 2015 MakerTim