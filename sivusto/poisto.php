<?php include("avusteet/yla.php");
require_once 'avusteet/kyselyt.php';

 /* poisto.php:n teht�v� on sanan varsinainen poistaminen. Jos k�ytt�j�ll�
 ei ole oikeuksia, tai jos poisto muuten ep�onnistuu, annetaan virheilmoitus.
 Muussa tapauksessa sana poistetaan ja k�ytt�j�lle ilmoitetaan toimenpiteen
 onnistuneen */

 $sana = $_POST["sana"];
 $sanaid = sanahaku($sana);
?>

<div id="content">
<?php
 if (!isset($_SESSION["kayttaja"])){
	echo "Ei oikeuksia!";
 }
 
 $sanaid = $_POST["sanaid"];
 if (sanapoisto($sanaid)){
  echo "Poisto onnistui.";
  ?> <a href="etusivu-alpha.php">Jatka</a> <?php
 } else {
  echo "Jotain meni vikaan...";
 }
 ?>
 </div>
<?php include("avusteet/ala.php"); ?>

