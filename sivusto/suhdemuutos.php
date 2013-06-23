<?php
require_once 'avusteet/kyselyt.php';

 $sana1id = $_POST["sana1ID"];
 $sana2id = $_POST["sana2ID"];
 $suhde = $_POST["suhde"];
 
 if (!is_int($sana2id)){
  echo "Jotain meni vikaan...";
 } else if (!sanatietohaku($sana2id)){
  echo "Jotain meni vikaan...";
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
