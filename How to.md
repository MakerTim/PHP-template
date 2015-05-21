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
**Website opzetten:**  
1. Ga naar de design server.  
2. Open map "Backup php template".  
3. Upload deze bestanden op je domain.  

---
**MktConfig configureren:**  
MktConfig is class om makkelijk van een plek de hele server variable te bedienen.  
de volgende dingen moet je voor elk nieuw domain aanpassen.

>
`public static $domein = "AanbiedingTurkije.nl"; `   
`public static $rootDir = "/";`    
`public static $keys = array("aanbieding", "turkije", "vakantie", "reizen", "hotels", "last minute", "all inclusive", "Goedkope Vakanties naar Turkije","zon", "zee", "strand");`  

**MktConfig configureren extra uitleg:**   
`public static $domein = " ";`  Hier vul je tussen de " "de naam van je domain in.  
`public static $rootDir = " ";` Hier vul je tussen de " " de rootdirectory in.  
`public static $keys = array();`  

---
**Updaten:**  
1. Download de nieuwste versie van git.    
2. Open de map classes en verwijder MktConfig.php  
3. Verwijder de map content.  
4. Upload alle bestanden naar de server.

**Update uitbrengen:**  
1. Maak een fork van de nieuwste versie van Git.   
2. Open de Git Terminal - https://msysgit.github.io/  
3. Ga naar een map waar je de site wilt plaatsen op je Computer.  
4. Gebruik de onderstaande git commands in de terminal:   
`git clone` https link van je eigen git fork.  
`git status`  - controle of alles goed gegaan is.  
*Voer de aanpassingen uit*  
`git add -A`  
`git commit` *Vul hier in een duidelijke uitleg wat je hebt veranderd en waarom*.  
`escape en dan :wq [enter]`, wq staat voor sla aanpassingen op en quit.   
`git push`  
volg de stappen om in te loggen bij git. 

Voor een betere uitleg over hoe git werkt, klik hier (http://rogerdudler.github.io/git-guide/index.nl.html)

---
**Pagina aanmaken:**  
1. Open Content map.  
2. Open Pages map.  
3. Maak een nieuw xml bestand aan met de naam van je pagina.  
4. Zet onderstaande code in je document.
>
`<Page>`  
`<Menu>`  
`<Index>Hotels</Index>`  
`<Banner>true</Banner>`  
`<SubIndex>Belek>Adam en Eve</SubIndex>`  
`<Sub>Hotelsidebar</Sub>`  
`</Menu>`  
`<Md>`  
`</Md>`  
`</Page>`
> 
 
5. Verander bij `<Index>` pagina naam.   
6. Kies voor banner ja of nee.   
7. Vul bij `<SubIndex>` de naam van het submenu item > naam hotel.
8. Vul bij `<Sub>` welk submenu je wilt  
9. Extra optie `<Title>` `</Title>` hier kan je een titel van je pagina toevoegen.  
10. Opslaan.  

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
>
`<MenuItem>`  
`<Name>Home</Name>`  
`<Alt>Naar de homepage</Alt>`  
`<Href>%root%/Pages/Index/</Href>`  
`<Priority>900</Priority>`  
`</MenuItem>`
> 

5. Verander bij `<Name>` menu naam.  
6. Verander bij `<Alt>`alt tekst.   
7. Verander <%root%/Page/Index/ in <%root%/Page/(naam van de pagina)/.  
8. Stel Priority in (hoe hoger hoe meer naar links).  
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
>
`<SideBar>`  
`<Option>`  
`<Name>Alanya</Name>`  
`<Href>../Alanya/</Href>`  
`<Sub>`  
`<Name>Tac Premier Hotel</Name>`  
`<Href>../Tac-Premier-Hotel/</Href>`  
`</Sub>`  
`<Sub>`  
`<Name>Titan Select</Name>`  
`<Href>../Titan-Select/</Href>`  
`</Sub>`  
`<Sub>`  
`<Name>Eftalia Aytur Hotel en appartementen</Name>`  
`<Href>../Eftalia-Aytur-Hotel-en-appartementen/</Href>`  
`</Sub>`  
`</Option>`  
`</SideBar>`
> 
 
5. Verander bij `<Name>` de naam van je menu item.  
6. Vul bij `<Href>` de link waar je naar toe wilt gaan in.  

**Sidebar toevoegen extra uitleg**  
`<Name>` hier komt de naam van het menu item.  
`<Href>`> hier komt de link waar je naar toe wilt gaan.  

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
**Linkjes:**    
>
`[Raphael](http://makertim.nl/) = Standaard link`  
`[!Raphael](http://makertim.nl/) = Standaard link die naar een nieuw tabblad gaat.`
`[#Raphael](http://makertim.nl/) = Button Look.`  
`[#!Raphael](http://makertim.nl/) = Button look.`

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
