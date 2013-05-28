<?php
 $alkukieli = $_POST["kielesta"];
 $kohdekieli = $_POST["kieleen"];
 $sana = $_GET["sana"];
 
 if ($sana = ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	// tietokantahaku
	echo $sana . "\n";
	echo "Määritelmä: Jonkinlainen äänneyhdistelmä, jota käytetään kommunikointiin."
 }
?>
