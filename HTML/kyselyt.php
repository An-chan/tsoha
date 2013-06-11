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

 function kaannoshaku($sana, $kielesta){
  $kysely = haeYhteys()->prepare("SELECT sana FROM sana, kaannos
WHERE sana1ID IN (SELECT sana1ID from sana, kaannos
  WHERE sana = ? AND sanaID=sana2ID AND kieliID=?) AND
sana1ID=sanaID");
  $kysely->execute(array($sana, $kielesta));
  if ($kysely->fetchObject() == null){
    $kysely = haeYhteys()->prepare("SELECT sana FROM sana, kaannos
    WHERE sana2ID IN (SELECT sana2ID from sana, kaannos
      WHERE sana = ? AND sanaID=sana1ID AND kieliID=?) AND
      sana2ID=sanaID");
    if ($kysely->execute(array($sana, $kielesta))){
      return $kysely->fetchObject();
    } else {
      return null;
    }
  } else {
    return $kysely->fetchObject();
  }
 }

 function synonyymihaku($sana){
  $kysely = haeYhteys()->prepare("SELECT ");

 }

 function antonyymihaku($sana){
  $kysely = haeYhteys()->prepare("SELECT ");

 }
 
 function sanamaara(){
  $kysely = haeYhteys()->prepare("SELECT COUNT (sana) as maara FROM sana");
  if ($kysely->execute()){
    $tulos = $kysely->fetch();
    $maara = $tulos["maara"];
    return $maara;
  } else {
    return 0;
  }
 }
 
 function sanalisays($sana, $kieli, $maaritelma, $sanaluokka, $tyyli, $lausunta){
  $kysely = haeYhteys()->prepare("INSERT INTO sana (sanaID, sana, kieliID, maaritelma, sanaluokka, tyyli, lausunta) VALUES (?, ?, ?, ?, ?, ?, ?);");
  $koodi = sanamaara() + 1;
  if ($kysely->execute(array($koodi, $sana, $kieli, $maaritelma, $sanaluokka, $tyyli, $lausunta))){
    echo "lisäys onnistui";
  } else {
    echo "jotain meni vikaan...";
  }
 }
?>




