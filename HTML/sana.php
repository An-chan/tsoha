<?php
 $sana = $_GET["sana"];
 $kysely = sanatietohaku($sana);
 
 while ($rivi = $kysely->fetch()) {
  echo "<b>" . $rivi["sana"] . "</b> <i>";
  echo $rivi["sanaluokka"] . "</i></br>";
  echo $rivi["lausunta"] . "</br>";
  echo $rivi["maaritelma"] . "</br>";
  echo "Tyyli: " . $rivi["tyyli"] . "</br>";
  echo "Kieli: " . $rivi["kieliid"] . "</br>";
 }

 if (isset($_SESSION["kayttaja"])){
	?><a href="sanamuokkaus.php?sana=<?php echo $sana ?>">Muokkaa sanaa</a>
	<?php
 }
?>
