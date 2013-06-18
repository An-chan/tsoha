<?php include("yla.php"); 
 require_once 'kyselyt.php';
 
 $sana = $_GET["sana"]; ?>

<div id="content">
<h3>Sanahaku</h3>
<form name="input" action="sanahaku.php" method="get">
Sana: <input type="text" name="sana">
<input type="submit" value="Hae">
</form> 

<div id="hakutulos">
 
 <?php if ($sana == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	$tulos = sanahaku($sana);
  if ($tulos != null){
    include 'sana.php';
  } else {
    echo "<i>Sanalla '$sana' ei tuloksia </i>";
  }
 }
?>
</div>
</div>

<?php include("ala.php"); ?>
