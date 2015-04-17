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
3. Maak een nieuw xml bestand aan met de naam van je pagina.  
4. Zet onderstaande code in je document.
>`<Page>`  
	`<Menu>`  
		`<Index>Stefan</Index>`  
		`<Banner>true</Banner>`  
		`<SideBar>true</SideBar>`  
		`<Sub>Long</Sub>`  
	`</Menu>`  
	`<Md>`  
`# Context`    
	`</Md>`  
`</Page>`
> 
 
5. Verander bij `<Index>` pagina naam.   
6. Kies voor banner ja of nee.   
7. Kies voor submenu ja of nee.  
8. Als submenu ja voeg `<Sub>`Submenu naam`<Sub>` toe.  
9. Extra optie `<Title>` `</Title>` hier kan je een titel van je pagina toevoegen.  
10. Opslaan.  

**Pagina aanmaken extra uitleg**   
`<Index>` hier komt de naam van de pagina.  
`<Banner>` hier geef je aan of je een banner wilt. (wel banner = true, geen banner = false)  
`<SideBar>` hier geef je aan of je een Sidemenu wilt. (wel Sidemenu = true, geen sidemenu = false)   
`<Sub>`   hier geef je de naam op van welk submenu je wilt hebben. (alllen nodig als je bij `<SideBar>` true hebt staan.)  
`<Title>` hier kan je de naam van je pagina invulen (dit is niet verplicht)

---
**Menu item aanmaken:**  
1. Open Content map.  
2. Open MainMenu map.  
3. Maak een nieuw xml bestand aan met de naam van je menuitem.  
4. Zet onderstaande code in je document.
>`<MenuItem>`  
	`<Name>Stefan</Name>`  
	`<Alt>Naar de homepage</Alt>`   
	`<Href>%root%/Page/Stefan/</Href>`  
	`<Priority>600</Priority>`  
`</MenuItem>`
> 

5. Verander bij `<Name>` menu naam.  
6. Verander bij `<Alt>`alt tekst.   
7. Verander <%root%/Page/Index/ in <%root%/Page/(naam van de pagina)/.  
8. Stel Priority in (de hoogste komt aan de linker kant).  
9. Opslaan.

**Menu item aanmaken extra uitleg**   
`<Name>`  hier komt de naam van je menu item.  
`<Alt>`  hier komt de alt tekst.  
`<Href>`  hier komt de link naar je page.  
`<Priority>` hier geef je hem een priority (dit geeft aan op welke plek in de menu hij komt).

---
**Sidebar toevoegen:**    
1. Open Content map.  
2. Open SideBar map.  
3. Maak een nieuw xml bestand aan met de naam van je submenu.  
4. Zet onderstaande code in je document.  
>`<SideBar>`  
	`<Option>`  
		`<Name>Home</Name>`  
		`<Href>#</Href>`  
		`<HasSub>false</HasSub>`  
	`</Option>`  
	`<Option>`  
		`<Name>Sub 1</Name>`  
		`<Href>#</Href>`  
		`<HasSub>true</HasSub>`  
		`<IsOpen>false</IsOpen>`  
		`<Sub>`  
			`<Name>Product 1.1</Name>`  
			`<Href>Contact</Href>`  
		`</Sub>`  
		`<Sub>`  
			`<Name>Product 1.2</Name>`  
			`<Href>Contact</Href>`  
		`</Sub>`   
	`</Option>`  
	`</SideBar>`  
> 
 
5. Verander bij `<Name>` de naam van je menu item.  
6. Vul bij `<Href>` de link waar je naar toe wilt gaan in.  
7. Geef aan bij `<HasSub>` of je item en subitem heeft (true/false)  
8. Als `<HasSub>` true voeg `<IsOpen></IsOpen>` toe.  
9. Vul bij `<IsOpen>``</IsOpen>` of je menu item standaard open is of niet.

**Sidebar toevoegen extra uitleg**  
`<Name>` hier komt de naam van het menu item.  
`<Href>`> hier komt de link waar je naar toe wilt gaan.  
`<HasSub>` hier geef je doormidel van true/false aan of je een subitem wilt (wel sub = true, geen sub = false).   
`<IsOpen>` geeft aan of je subitem standaard open of dicht staat. (dicht= false, open=true).

---
**Counter waarde aanpassen:**  
Om de counter aan te passen voer je de volgende handelingen uit:  
1. Open ViewCounter map.  
	* je ziet nu alle counter bestanden.  
2. Kies de counter welke je wilt aanpassen (pagina).  
3. Open dit bestand.  
	* je ziet nu een getal (dit is het aantal bezoekers).   
4. Pas dit getal aan (naar het getal wat je wilt hebben).  
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