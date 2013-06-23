<?php
require_once 'avusteet/kyselyt.php';
 
 /* suhdemuutos.php suorittaa uusien sanasuhteiden lisäämisen. Jos lisäys
 epäonnistuu, annetaan virheilmoitus. Jos se onnistuu, annetaan tästä
 käyttäjälle ilmoitus. Kaikkien suhteiden lisäys, laadusta huolimatta,
 tapahtuu tämän tiedoston kautta. */

 $sana1id = $_POST["sana1ID"];
 $sana2id = $_POST["sana2ID"];
 $suhde = $_POST["suhde"];
 
 if (!is_int(intval($sana2id))){
  echo "Jotain meni vikaan... " . $sana2id . " ei ollut numero";
 } else {
  if ($suhde == "kaannos"){
   if (lisaaKaannos($sana1id, $sana2id)){
     echo "Lisäys onnistui!";
   } else {
     echo "Jotain meni vikaan...";
   }
  } else if ($suhde == "synonyymi"){
   if (lisaaSynonyymi($sana1id, $sana2id)){
     echo "Lisäys onnistui!";
   } else {
     echo "Jotain meni vikaan...";
   }
  } else if ($suhde == "antonyymi"){
   if (lisaaAntonyymi($sana1id, $sana2id)){
     echo "Lisäys onnistui!";
   } else {
     echo "Jotain meni vikaan...";
   }
  }
 }
 
 ?>
 
 <br>
 <a href="etusivu-alpha.php">Jatka</a>
