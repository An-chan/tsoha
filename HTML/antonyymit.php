<?php include("yla.php");
require_once 'kyselyt.php';

$sana = $_GET["sana"]?>

<div id="content">
<h3>Antonyymihaku</h3><br>
<form name="input" action="antonyymit.php" method="get">
Sana: <input type="text" name="sana">
<input type="submit" value="Hae">
</form>
<div id="hakutulos">
  <b> Antonyymit </b><br><br>
 <?php if ($sana == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	$tulos = antonyymihaku($sana);
	if ($tulos != null){
	  echo "Sanan '$sana' antonyymit:<br><br>";
	  include 'sana.php';
	} else {
	  echo 'Sanalle ' . $sana . ' ei antonyymejä'; 
	}
 }
?>
</div></div>

<?php include("ala.php"); ?>
