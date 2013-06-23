<?php include("avusteet/yla.php");
require_once 'avusteet/kyselyt.php';

 /* sanamuokkaus.php on sanan muokkaamisen keskussivu, josta pääsee
 muokkaamisen eri vaihtoehtoihin. Tällä hetkellä näitä ovat sanan
 poistaminen ja sen suhteiden lisääminen. Tulevaisuudessa voitaisiin
 myös luoda mahdollisuudet päivittää sanan määritelmää, poistaa jo
 olemassa olevia yhteyksiä, sekä muita operaatioita. Uudet ominaisuudet
 on helppo lisätä uusina tiedostoina ja niihin johtavina painikkeina. */ ?>

<div id="content">
<?php
 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!";
 }
 
 $sanaid = $_GET["sanaid"];
 $tulos = sanatietohaku($sanaid)->fetch();
 $sana = $tulos["sana"];
 echo "<b>" . $sana . "</b><br>";
 echo "SanaID: " . $sanaid . "<br><br>";
 
?>
<form action="sanasuhteet.php" method="post">
<input type="hidden" name="sanaid" value="<?php echo $sanaid ?>">
<input type="submit" value="Muokkaa sanaa">
</form>
<form action="poisto.php" method="post">
<input type="hidden" name="sanaid" value="<?php echo $sanaid ?>">
<input type="submit" value="Poista sana">
</form>
</div>

<?php include("avusteet/ala.php"); ?>
