<?php include("yla.php"); ?>

<div id="content">
<?php
 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!";
 }
 
 $sana = $_GET["sana"];
 echo "<b>" . $sana . "</b><br><br>";
 
?>
<form action="sanasuhteet.php" method="post">
<input type="hidden" name="sana" value="<?php echo $sana ?>">
<input type="submit" value="Muokkaa sanaa">
</form>
</div>
<form action="poisto.php" method="post">
<input type="hidden" name="sana" value="<?php echo $sana ?>">
<input type="submit" value="Poista sana">
</form>
</div>

<?php include("ala.php"); ?>
