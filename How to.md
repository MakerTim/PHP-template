# How to
---
**Gebruik maken van Markdown.**  
Omdat we gebruik maken van Markdown vind je hieronder twee linkjes met uitleg.
  
**Basic Markdown:**   
(https://help.github.com/articles/markdown-basics/)  
**Advanced Markdown:**   
(https://help.github.com/articles/github-flavored-markdown/)  
**Markdown Iframe:**   
(https://github.com/MakerTim/PHP-template/blob/master/Markdown%20iframe.md)  

---
**Pagina aanmaken:**  
1. Open Content map.  
2. Open Pages map.  
3. Kopier index.xml  
4. Hernoem hem (naam van pagina)  
5. Open het bestand.  
6. Verander bij `<Index>` pagina naam.   
7. Kies voor banner ja of nee. (deze altijd op true zetten)   
8a. Kies voor submenu ja of nee.  
8b. Als submenu ja voeg `<Sub>`Submenu naam`<Sub>` toe.  
9. Extra optie `<Title>` `</Title>` hier kan je een titel van je pagina toevoegen.  
10. Opslaan.  

**Pagina aanmaken extra uitleg**   
`<Index>` hier komt de naam van de pagina.  
`<Banner>` hier geef je aan of je een banner wilt. (wel banner = true, geen banner = false)  
`<SideBar>` hier geef je aan of je een Sidemenu wilt. (wel Sidemenu = true, geen sidemenu = false)   
`<Sub>`   hier geef je de naam op van welk submenu je wilt hebben. (alllen nodig als je bij `<SideBar>` true hebt staan  
`<Title>` hier kan je de naam van je pagina invulen (dit is niet verplicht)

---
**Menu item aanmaken:**  
1. Open Content map.  
2. Open MainMenu map.  
3. Kopier home.xml  
4. Hernoem hem (naam van menu item)  
5. Open het bestand.  
6. Verander bij `<Name>` menu naam.  
7. Verander bij `<Alt>`alt tekst.   
8. Verander <%root%/Page/Index/ in <%root%/Page/(naam van de pagina)/.  
9. Stel Priority in (de hoogste komt aan de linker kant).  
10. Opslaan.

**Menu item aanmaken extra uitleg**   
`<Name>`  hier komt de naam van je menu item.  
`<Alt>`  hier komt de alt tekst.  
`<Href>`  hier komt de link naar je page.  
`<Priority>` hier geef je hem een priority (dit geeft aan op welke plek in de menu hij komt).

---
**Sidebar toevoegen:**    
1. Open Content map.  
2. Open SideBar map.  
3. Kopier test.xml  
4. Hernoem hem (naam van submenu)  
5. Open het bestand.   
6. Verander bij `<Name>` de naam van je menu item.  
7. Vul bij `<Href>` de link waar je naar toe wilt gaan in.  
8a. Geef aan bij `<HasSub>` of je item en subitem heeft (true/false)  
8b. Als `<HasSub>` true voeg <IsOpen></IsOpen> toe.  
8c. Vul bij `<IsOpen>``</IsOpen>` of je menu item standaard open is of niet

**Sidebar toevoegen extra uitleg**  
`<Name>` hier komt de naam van het menu item.  
`<Href>`> hier komt de link waar je naar toe wilt gaan.  
`<HasSub>` hier geef je doormidel van true/false aan of je een subitem wilt (wel sub = true, geen sub = false)   
`<IsOpen>` geeft aan of je subitem standaard open of dicht staat. (dicht= false, open=true)

---
**Counter waarde aanpassen:**  
Om de counter aan te passen voer je de volgende handelingen uit:  
1. Open ViewCounter map.  
	* je ziet nu alle counter bestanden  
2. Kies de counter welke je wilt aanpassen (pagina)  
3. Open dit bestand.  
	* je ziet nu een getal (dit is het aantal bezoekers)   
4. Pas dit getal aan (naar het getal wat je wilt hebben)  
5. Opslaan.

---
**Css aanpassen:**  
Als je de css bestanden wilt aanpassen kijk dan goed of je de juiste aanpast. (allen doen als je over de juiste kennis beschikt)  
1. **cookie.css:** In dit bestand kan je het uiterlijk van de cookie popup aanpassen.  
2. **markdown.css:** In dit bestand kan je de Markdown style aanpassen (liever deze niet aanpassen)   
3. **mobiel.css:** In dit bestand kan je het uiterlijk van de mobiele weergave aanpassen.   
4. **SocialMedia.css:**  In dit bestand kan je het uiterlijk van de socialMedia linkjes   aanpassen.   
5. **style.css:**  In dit bestand kan je het uiterlijk van de desktop weergave aanpassen.  
6. **SubMenuStyle.css:**  In dit bestand kan je het uiterlijk van het submenu aanpassen.  
7. **SubMenuStyleMobiel.css:**  In dit bestand kan je het uiterlijk van het submenu van de mobiele weergave aanpassen.  

---
**Favicon veranderen:**    
1. Open Content map.  
2. Open Pictures map.  
3. Vervang favicon.ico (naar je eigen favicon.ico)

---
**Header aanpassen:**    
1. Open Content map.  
2. Open Pictures map.  
3. Vervang header.jpg (naar je eigen header.jpg)

© Copyright 2015 MakerTim