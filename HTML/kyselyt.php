<?php

 function haeYhteys(){
  static $yhteys = null;
  
  if ($yhteys == null) {
	  try {
	    $yhteys = new PDO("pgsql:dbname=asperhee");
	  } catch (PDOException $e) {
	    die("VIRHE: " . $e->getMessage());
	  }
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  return $yhteys;
 }

 function tunnistaudu($tunnus, $salasana){
  $kysely = haeYhteys()->prepare("SELECT kayttajaID FROM kayttajat where kayttajaID = ? AND salasana = ?");
  if ($kysely->execute(array($tunnus, $salasana))){
    return $kysely->fetchObject();
  } else {
    return false;
  }
 }

 function sanalista($kieli){
  $kysely = haeYhteys()->prepare("SELECT sana from sana WHERE kieliID = ?");
  if ($kysely->execute(array($kieli))){
    return $kysely;
  } else {
    return null;
  }
 }

 function sanahaku($sana){
  $kysely = haeYhteys()->prepare("SELECT sana from sana WHERE sana = ?");
  // vai pitäisikö hakea myös samankaltaisia sanoja?
  if ($kysely->execute(array($sana))){
    return $kysely->fetchObject();
  } else {
    return null;
  }
 }

 function sanatietohaku($sana){
  $kysely = haeYhteys()->prepare("SELECT * FROM sana WHERE sana = ?");
  if ($kysely->execute(array($sana))){
    return $kysely;
  } else {
    return null;
  }
 }

 function kaannoshaku($sana, $kielesta, $kieleen){
  $kysely = haeYhteys()->prepare("SELECT sana FROM sana, kaannos WHERE sana = ? AND
                                  (sana.sanaID = kaannos.sana1ID OR sana.sanaID = kaannos.sana2ID)
                                  AND sana.kieliID= ?");
  if ($kysely->execute(array($sana, $kielesta))){
    return $kysely->fetchObject();
  } else {
    return null;
  }
 }

 function synonyymihaku($sana){
  $kysely = haeYhteys()->prepare("SELECT ");

 }

 function antonyymihaku($sana){
  $kysely = haeYhteys()->prepare("SELECT ");

 }
?>
