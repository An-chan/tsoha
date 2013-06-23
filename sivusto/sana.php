<?php
require_once 'avusteet/kyselyt.php';
 /* Tämä tiedosto on tarkoitettu kaikkien eri hakujen tulosten näyttämiseen.
 Sanat näytetään aina samalla tavalla, mahdollisimman siististi ja
 helppolukuisesti esitettynä. Jos sanoilta poistetaan attribuutteja tai niitä
 lisätään, tai jos esitystapaa halutaan muuten vain muuttaa, tarvitsee tällöin
 muuttaa vain tämän tiedoston sisältöä. */

 $onkoTulos = false;
 while ($row = $tulos->fetch()){
  $onkoTulos = true;
  $sanaID = $row["sanaid"];
  $kysely = sanatietohaku($sanaID);
  
  while ($rivi = $kysely->fetch()) {
    echo "<b>" . $rivi["sana"] . "</b> <i>";
    echo $rivi["sanaluokka"] . "</i></br>";
    echo $rivi["maaritelma"] . "</br>";
    echo "Tyyli: " . $rivi["tyyli"] . "</br>";
    echo "Kieli: " . $rivi["kieliid"] . "</br>";
    echo "Esimerkki: \"" . $rivi["esimerkki"] . "\" </br>";
    echo "</br>";
  }
  if (isset($_SESSION["kayttaja"])){
  echo "Sanan ID: " . $sanaID;
	?>
	<form action="sanamuokkaus.php" method="get">
  <input type="hidden" name="sanaid" value="<?php echo $sanaID ?>">
  <input type="submit" value="Muokkaa sanaa">
  </form><br><br>
	<?php
  }
 }
 
 if (!$onkoTulos){
   echo "<i>Sanalla " . $sana . " ei tuloksia.</i>";
 }
 
?>
