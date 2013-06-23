<?php include("avusteet/yla.php");
require_once 'avusteet/kyselyt.php';
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
 <?php
 include("ala.php"); ?>

