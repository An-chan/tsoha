<?php
 $kieli = $_GET["kieli"];

 if ($kieli = ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	// tänne tietokantahaku
	echo $sana . "\n";
	echo "Määritelmä: äänneyhdistelmä, jota käytetään kommunikointiin."
 }
?>
