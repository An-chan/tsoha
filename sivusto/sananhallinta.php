<?php include("avusteet/yla.php");

 /* Tämä tiedosto on tarkoitettu sanojen lisäämiseen sekä tulevaisuudessa myös
 mahdollisesti muihinkin tietokannan hallintaan liittyvään toiminnallisuuteen.
 Se on tarjolla vain kirjautuneille käyttäjille. */

 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!";
 }
 $kayt = $_SESSION["kayttaja"]; ?>
 <div id="content">
<p><b>Huom!</b> Tämä sivu on uusien sanojen luomista varten. Mikäli haluat muokata olemassaolevia sanoja tai niiden välisiä yhteyksiä, etsi haluamasi sana tavallisen sanahaun kautta ja klikkaa sanan tiedoista löytyvää "Muokkaa sanaa" -linkkiä. Uuden sanan luodaksesi noudata allaolevia ohjeita. </p>

<p>Täytä kaikki allaolevat kentät ja tarkasta ne kirjoitus- ja muiden virheiden varalta ennen uuden sanan lisäämistä. Tähdellä merkityt kentät ovat pakollisia. Suosittelemme kopioimaan kirjoittamasi määritelmän leikepöydälle ennen sanan lisäämistä, sillä mahdollisten virheiden sattuessa et välttämättä pääse siihen enää käsiksi.</p>
<form action="sananlisays.php" method="post">
Sana: <input type="text" name="sana">*</br>
  <select name="kieli">
   <option value="fin">suomi</option>
   <option value="eng">englanti</option>
  </select>*</br>
  <textarea name="maaritelma" rows="10" cols="30">
Sanan määritelmä (pakollinen)
  </textarea></br>
Sanaluokka*: <select name="sanaluok" value="subs">
  <option value="subs">Substantiivi</option>
  <option value="adj">Adjektiivi</option>
  <option value="verbi">Verbi</option>
  <option value="part">Partikkeli</option>
  <option value="tyhja">Määrittelemätön</option></select></br>
Tyyli*: <select name="tyyli" value="normaali">
  <option value="normaali">Normaali</option>
  <option value="formaali">Formaali</option>
  <option value="informaali">Informaali</option>
  <option value="alatyyli">Alatyyli</option>
  <option value="akatee">Akateeminen</option></select></br>
Esimerkkilause: <input type="text" name="esimerkki"> <i>(Vapaaehtoinen)</i></br>
 <input type="submit" value="Lisää uusi sana">
</form>
 </div>
 
<?php include("avusteet/ala.php"); ?>
