<?php
 $alkukieli = $_POST["kielesta"];
 $kohdekieli = $_POST["kieleen"];
 $sana = $_GET["sana"];
 
 if ($sana = ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	// tietokantahaku
	echo $sana;
	echo "<br> Määritelmä: Jonkinlainen äänneyhdistelmä, jota käytetään kommunikointiin."
 }
?>
