<?php include("avusteet/yla.php");
require_once 'avusteet/kyselyt.php';?>

<div id="content">
<?php
 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!";
 }
 
 $sanaid = $_GET["sanaid"];
 $tulos = sanatietohaku($sanaid)->fetch();
 $sana = $tulos["sana"];
 echo "<b>" . $sana . "</b><br>";
 echo "SanaID: " . $sanaid . "<br><br>";
 
?>
<form action="sanasuhteet.php" method="post">
<input type="hidden" name="sanaid" value="<?php echo $sanaid ?>">
<input type="submit" value="Muokkaa sanaa">
</form>
<form action="poisto.php" method="post">
<input type="hidden" name="sanaid" value="<?php echo $sanaid ?>">
<input type="submit" value="Poista sana">
</form>
</div>

<?php include("avusteet/ala.php"); ?>
