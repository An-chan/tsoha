<?php
require_once 'kyselyt.php';

 $sanaID = $tulos->sanaid;
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
	?><br><a href="sanamuokkaus.php?sana=<?php echo $sana ?>">Muokkaa sanaa</a>
	<?php
 }
?>
