<?php include("yla.php"); 

 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!";
 }
 $kayt = $_SESSION["kayt"]; ?>
 <div id="content">
<p><b>Huom!</b> Tämä sivu on uusien sanojen luomista varten. Mikäli haluat muokata olemassaolevia sanoja tai niiden välisiä yhteyksiä, etsi haluamasi sana tavallisen sanahaun kautta ja klikkaa sanan tiedoista löytyvää "Muokkaa sanaa" -linkkiä. Uuden sanan luodaksesi noudata allaolevia ohjeita. </p>

<p>Täytä kaikki allaolevat kentät ja tarkasta ne kirjoitus- ja muiden virheiden varalta ennen uuden sanan lisäämistä. Tähdellä merkityt kentät ovat pakollisia. Suosittelemme kopioimaan kirjoittamasi määritelmän leikepöydälle ennen sanan lisäämistä, sillä mahdollisten virheiden sattuessa et välttämättä pääse siihen enää käsiksi.</p>
<form action="sananlisays.php" method="post">
Sana: <input type="text" name="sana">*</br>
<select name="kieli">
<option value="fin">suomi</option>
<option value="eng">englanti</option>
</select>*</br>
<textarea rows="10" cols="30">
Sanan määritelmä (pakollinen)
</textarea></br>
Sanaluokka*: <input type="radio" name="sanaluok" value="subs">Substantiivi
<input type="radio" name="sanaluok" value="adj">Adjektiivi
<input type="radio" name="sanaluok" value="verbi">Verbi
<input type="radio" name="sanaluok" value="part">Partikkeli
<input type="radio" name="sanaluok" value="tyhja">Määrittelemätön</br>
Tyyli*: <input type="radio" name="tyyli" value="normaali">Normaali
<input type="radio" name="tyyli" value="formaali">Formaali
<input type="radio" name="tyyli" value="informaali">Informaali
<input type="radio" name="tyyli" value="alatyyli">Alatyyli
<input type="radio" name="tyyli" value="akatee">Akateeminen</br>
Lausumisohje: <input type="text" name="sana"> <i>(Vapaaehtoinen)</i></br>
<input type="submit" value="Lisää uusi sana">
</form>
 </div>
 
<?php include("ala.php"); ?>
