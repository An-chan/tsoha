<?php include("yla.php"); ?>

<div id="content">
<?php
 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!";
 }
 
 $sana = $_GET["sana"];
 echo $sana;
 
?>
<a href="etusivu-alpha.php">Poista sana</a>
<a href="etusivu-alpha.php">Muokkaa sanaa</a>

</div>

<?php include("ala.php"); ?>
