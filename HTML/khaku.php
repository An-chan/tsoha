<?php
 require_once 'kyselyt.php';
 $alkukieli = $_POST["kielesta"];
 $sana = $_GET["sana"];
 
 if ($sana == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	$tulos = kaannoshaku($sana, $alkukieli);
  if ($tulos){
    include 'sana.php';
  } else {
    echo "<i>Sanalla '$sana' kielestä '$alkukieli' ei tuloksia </i>";
  }
 }
?>
