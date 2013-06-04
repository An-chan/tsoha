<?php include("yla.php"); ?>

<div id="content">
<h3>Sanalista</h3>
Valitse kieli:
<form name="haku" action="sanalista.php" method="get">
<select name="kieli">
<option value="fin">suomi</option>
<option value="eng">englanti</option>
</select>
<input type="submit" value="Hae"></form> 
</div>

<div id="hakutulos">
<?php
 $kieli = $_GET["kieli"];

 if ($kieli == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	// tänne tietokantahaku
	echo "Lista sanoista kielellä ";
	echo $kieli;
 }
?>
 </div>

<?php include("ala.php"); ?>
