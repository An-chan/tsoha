<?php include("yla.php"); 

 $alkukieli = $_POST["kielesta"];
 $kohdekieli = $_POST["kieleen"];
 $sana = $_GET["sana"]; ?>

<div id="content">
<h3>Käännöshaku</h3>
Kielestä
<form action="" method="post">
<select name="kielesta">
<option value="suomi">suomi</option>
<option value="eng">englanti</option>
</select>
</form>
kieleen
<form action="" method="post">
<select name="kieleen">
<option value="eng">englanti</option>
<option value="suomi">suomi</option>
</select>
</form>
<form name="input" action="khaku.php" method="get">
Sana: <input type="text" name="sana">
<input type="submit" value="Hae">
</form> 
</div>

<div id="hakutulos">
 
 <?php if ($sana = ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	// tietokantahaku
	echo $sana . "\n";
	echo "Määritelmä: Jonkinlainen äänneyhdistelmä, jota käytetään kommunikointiin."
 }
?>
</div>

<?php include("ala.php"); ?>
