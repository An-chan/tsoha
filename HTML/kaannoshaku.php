<?php include("yla.php");
 require_once 'kyselyt.php';

 $alkukieli = $_POST["kielesta"];
 $sana = $_POST["sana"];
 ?>

<div id="content">
<h3>Käännöshaku</h3>
Kielestä
<form action="kaannoshaku.php" method="post">
<select name="kielesta">
<option value="fin">suomi</option>
<option value="eng">englanti</option>
</select><br>
kieleen<br>
<select name="kieleen">
<option value="eng">englanti</option>
<option value="fin">suomi</option>
</select><br>
<form name="input" action="kaannoshaku.php" method="get">
Sana: <input type="text" name="sana">
<input type="submit" value="Hae">
</form> 
</div>

<div id="hakutulos">
 
<?php
  if ($sana == ""){
	echo "<i> Ei tuloksia </i>";
 } else {
	$tulos = kaannoshaku($sana, $alkukieli);
  if ($tulos){
    include 'sana.php';
  } else {
    echo "<i>Sanalla '$sana' kielestä '$alkukieli' ei tuloksia </i>";
  }
 }
?>
</div>

<?php include("ala.php"); ?>
