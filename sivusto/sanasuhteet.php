﻿<?php include("avusteet/yla.php");
require_once 'avusteet/kyselyt.php';

 /* Sanasuhteet.php mahdollistaa kirjautuneen käyttäjän haluamien suhteiden
 lisäyksen tietokantaan. Lisätä voi siis käännössuhteita, synonyymisuhteita tai
 antonyymisuhteita, tulevaisuudessa mahdollisesti muitakin tietokantaan
 sisällytettyjä sanojen välisiä suhteita. */ ?>
 
 <div id="content">
<?php
 if (!isset($_SESSION["kayttaja"])){
	echo "Pääsy kielletty!";
 }
 
 $sanaid = $_POST["sanaid"];
 $tulos = sanatietohaku($sanaid)->fetch();
 $sana = $tulos["sana"];
 echo "<b>" . $sana . "</b><br>";
 echo "SanaID: " . $sanaid . "<br><br>"; ?>
 
 Kirjoita asianmukaiseen kenttään haluamasi sanan ID-numero, jotta samalla tavalla kirjoitetut sanat eivät sekoitu keskenään. ID löytyy sanan omalta sivulta.<br><br>
 
<form action="suhdemuutos.php" method="post">
<input type="hidden" name="sana1ID" value="<?php echo $sanaid ?>">
<input type="hidden" name="suhde" value="kaannos">
<input type="text" name="sana2ID">
<input type="submit" value="Lisää käännös">
</form>
<form action="suhdemuutos.php" method="post">
<input type="hidden" name="sana1ID" value="<?php echo $sanaid ?>">
<input type="hidden" name="suhde" value="synonyymi">
<input type="text" name="sana2ID">
<input type="submit" value="Lisää synonyymi">
</form>
<form action="suhdemuutos.php" method="post">
<input type="hidden" name="sana" value="<?php echo $sanaid ?>">
<input type="hidden" name="suhde" value="antonyymi">
<input type="text" name="sana2ID">
<input type="submit" value="Lisää antonyymi">
</form>
</div>
 
<?php include("avusteet/ala.php"); ?>
