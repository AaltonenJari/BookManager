# BookManager
Backend Development Task

BookManager on kirjakokoelman hallintaohjelmisto, jolla voi lisätä, muuttaa ja poistaa kirjan tietoja. Se on selainpohjainen ohjelmisto, joka toimii Internet-palvelimella.

Ohjelman kehitysympäristönä on Windows-tietokone, johon on asennettu WAMP-server. WAMP on lyhenne sanoista Windows, Apache, MySQL ja PHP. Ohjelma on toteutettu PHP-ohjelmointikielellä ja se käyttää MySQL-kantaa. FrontEnd-osuudessa on käytetty HTML5/CSS3/JavaScript/jQuery -tekniikkaa. Lisäksi mukana on CodeIgniter-ohjelmistokehys, joka perustuu model–view–controller -suunnittelumalliin (MVC). 

Asennus:
Tehdään ensin serverin päähakemiston (esim. C:\wamp64\www) alle uusi hakemisto BookManager. Ladataan Codeigniter (tässä tapauksessa versio 3.1.13) ja puretaan se BookManager-hakemistoon pohjaksi. Päälle kopioidaan tämän repositoryn tiedostot.

Huomaa että tässe repositositoryssä application\config-hakemistossa olevat tiedostot karvaavat CodeIgniterin vastaavat tiedostot. Kyseessä ovat seuraavat tiedostot: config.php, database.php, autoload.php ja routes.php. Tämän jälkeen tiedosto database.php pitää konfiguroida uudestaan vastaamaan kohdeympäristön tietokantaa. Toisin sanoen Käyttäjätunnus ja salasana pitää määritellä.

Hakemistossa assets/database on tietokannan luontijono books.sql. Sillä saadaan alkutilanne palvelimen tietokantaan.

Käynnistys:
Päähakemistossa on komentotiedosto bookmanager.bat, joka käynnistää ohjelman oletusselaimeen. WAMP server pitää olla käynnissä. (WAMP serverin käynnistystä ei ole lisätty komentotiedostoon, koska se jää käyntiin, vaikka selain suljetaan).
