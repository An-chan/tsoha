<?php include("yla.php");
 require_once 'kyselyt.php';?>

<div id="content">
<h3>Sanalista</h3>
Valitse kieli:
<form name="haku" action="sanalista.php" method="get">
<select name="kieli">
<option value="fin">suomi</option>
<option value="eng">englanti</option>
</select>
<input type="submit" value="Hae"></form> 

<div id="hakutulos">
<?php
 $kieli = $_GET["kieli"];

 if ($kieli == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	$kysely = sanalista($kieli);
	echo "Lista sanoista kielellä ";
	echo $kieli . "</br>";
  while ($rivi = $kysely->fetch()) {
    $sana = $rivi["sana"];
    echo '<a href="sanahaku.php?sana=' . $sana . '">' . $sana . '</a></br>';
  }
 }
?>
 </div></div>

<?php include("ala.php"); ?>
