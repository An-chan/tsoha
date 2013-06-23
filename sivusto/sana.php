<?php
require_once 'avusteet/kyselyt.php';
 /* T�m� tiedosto on tarkoitettu kaikkien eri hakujen tulosten n�ytt�miseen.
 Sanat n�ytet��n aina samalla tavalla, mahdollisimman siististi ja
 helppolukuisesti esitettyn�. Jos sanoilta poistetaan attribuutteja tai niit�
 lis�t��n, tai jos esitystapaa halutaan muuten vain muuttaa, tarvitsee t�ll�in
 muuttaa vain t�m�n tiedoston sis�lt��. */

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
