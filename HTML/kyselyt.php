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
    return $kysely->fetchObject();
  } else {
    return null;
  }
 }

 function sanahaku($sana){
  global $yhteys;
  $kysely = haeYhteys()->prepare("SELECT sana from sana WHERE sana = ?");
  // vai pitäisikö hakea myös samankaltaisia sanoja?
  if ($kysely->execute(array($sana))){
    return $kysely->fetchObject();
  } else {
    return null;
  }
 }

 function sanatietohaku($sana){
  global $yhteys;

 }

 function kaannoshaku($sana, $kielesta, $kieleen){
  global $yhteys;

 }

 function synonyymihaku($sana){
  global $yhteys;

 }

 function antonyymihaku($sana){
  global $yhteys;

 }
?>
