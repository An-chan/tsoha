<?php include("yla.php"); ?>

<div id="content">
<?php
 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!"
 }
 $kayt = $_SESSION["kayt"];

 
?>
</div>

<?php include("ala.php"); ?>
