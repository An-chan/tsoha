<?php include("yla.php"); ?>

<div id="content">
<h3>Antonyymihaku</h3><br>
<form name="input" action="jotain" method="get">
Sana: <input type="text" name="sana">
<input type="submit" value="Hae">
</form></div>
<div id="hakutulos">
 
 <?php if ($sana == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	// tietokantahaku
	echo $sana . "\n";
	echo "Määritelmä: Jonkinlainen äänneyhdistelmä, jota käytetään kommunikointiin.";
 }
?>
</div>

<?php include("ala.php"); ?>
