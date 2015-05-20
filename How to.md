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
**MktConfig configureren:**  
MktConfig is class om makkelijk van een plek de hele server variable te bedienen.  
de volgende dingen moet je voor elk nieuw domain aanpassen.

// SocialMedia - Laat leeg voor geen knop  
public static $google = "#google+ account";  
public static $facebook = "#facebook account";  
public static $twitter = "#twitter account";  

// Domein van de site, exclusief http  
public static $domein = "#domain naam";  
public static $rootDir = '#root directory';   
public static $keys = array( "#key", "#key", "#key", "#key", "#key", #key", "#key", "#key");  

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
		`<SubIndex>New York>Skyline</SubIndex>`   
		`<Sub>Long</Sub>`  
		`<Title>Dit word de titel van de pagina</Title>`    
	`</Menu>`  
	`<Md>`  
`# Context`    
	`</Md>`  
`</Page>`
> 
 
5. Verander bij `<Index>` pagina naam.   
6. Kies voor banner ja of nee.   
7. Vul bij `<SubIndex>` de naam van het submenu item > naam hotel.   
8. Extra optie `<Title>` `</Title>` hier kan je een titel van je pagina toevoegen.  
9. Opslaan.  

**Pagina aanmaken extra uitleg**   
`<Index>` hier komt de naam van de pagina.  
`<Banner>` hier geef je aan of je een banner wilt. (wel banner = true, geen banner = false)  
`<SubIndex>` je geef hier de hightlight van het submenu item mee aan.
`<Sub>`   hier geef je de naam op van welk submenu je wilt hebben.
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
**Favicon veranderen:**    
1. Open Content map.  
2. Open Pictures map.  
3. Vervang favicon.ico (naar je eigen favicon.ico)

---
**Header aanpassen:**    
1. Open Content map.  
2. Open Pictures map.  
3. Vervang header.jpg (naar je eigen header.jpg)

---
**Link maken die naar nieuw tabblad gaat:**    
>` [#Text](http://google.nl/)`  


Zet een # voor de tekst van de link, dan gaat hij naar een nieuwe tabblad

---
**Custom button**  
1. Open Classes map.  
2. Open MktConfig.php  
3. Zoek op `public static $customButton = array(`  
4. Plaats in de array je custom button. 

---
**Kleuren aanpassen:**  
het aanpassen van de kleuren gebeurd in de Mktconfig.  
In dit bestaand zie je de class "class MktColor" hierin verander je de kleuren.

**Kleuren aanpassen extra uitleg**  
Gebruik alleen kleuren van http://html-color-codes.info/  
Gebruik alleen 'rgba(255,255,255,1.0);'  
Templates eventueel beschikbaar in /Templates/  
rgba staat voor Rood, Groen, Blauw, Alpha  
Een combinatie van de 3 kleuren maken alle kleuren mogelijk  
Alpha is de transparantie van de kleur, 1 = niet transparant, 0 = 100% transparant, komma getal toegestaan

---
**Eigen script toevoegen:**  
voor het toevoegen van je eigen script hebben we een bestand gemaakt ("IncludeScripts")  
Dit bestand vind je in de root van de template.  
1. het enige wat je moet doen is dit bestand je script neerzetten

© Copyright 2015 MakerTim