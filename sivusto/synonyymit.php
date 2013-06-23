<?php include("avusteet/yla.php");
require_once 'avusteet/kyselyt.php';

 /* Tiedosto suorittaa synonyymien hakemisen. Tulokset generoidaan ja näytetään
 samalla sivulla sana.php:n avulla. */

$sana = $_GET["sana"]?>

<div id="content">
<h3>Synonyymihaku</h3><br>
<form name="input" action="synonyymit.php" method="get">
Sana: <input type="text" name="sana">
<input type="submit" value="Hae">
</form>

<div id="hakutulos">
 <b> Synonyymit </b><br><br>
 
 <?php if ($sana == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	$tulos = synonyymihaku($sana);
	if ($tulos != null){
	  echo "Sanan '$sana' synonyymit:<br><br>";
	  include 'sana.php';
	} else {
	  echo 'Sanalle ' . $sana . ' ei synonyymejä'; 
	}
 }
?>
</div></div>

<?php include("avusteet/ala.php"); ?>
