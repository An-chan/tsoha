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
  $kysely = haeYhteys()->prepare("SELECT sanaID from sana WHERE sana = ?");
  // vai pitäisikö hakea myös samankaltaisia sanoja?
  if ($kysely->execute(array($sana))){
    return $kysely->fetchObject();
  } else {
    return null;
  }
 }

 function sanatietohaku($sanaID){
  $kysely = haeYhteys()->prepare("SELECT * FROM sana WHERE sanaID = ?");
  if ($kysely->execute(array($sanaID))){
    return $kysely;
  } else {
    return null;
  }
 }

 function kaannoshaku($sana, $kielesta){
  $sanaid = sanahaku($sana)->sanaid;
  $kysely = haeYhteys()->prepare("SELECT sana1ID, sana2ID FROM kaannos
    WHERE sana1ID=? or sana2ID = ?");
  if ($kysely->execute(array($sanaid, $sanaid))){
    $tulos = $kysely->fetchObject();
    $kysely = haeYhteys()->prepare("SELECT sanaID from sana where sanaID=?");
    if($tulos->sana1id == $sanaid){
      $kysely->execute(array($tulos->sana2id));
    } else {
      $kysely->execute(array($tulos->sana1id));
    }
    return $kysely->fetchObject();
  } else {
    return null;
  }
 }

 function synonyymihaku($sana){
  $sanaid = sanahaku($sana)->sanaid;
  $kysely = haeYhteys()->prepare("SELECT sana1ID, sana2ID FROM synonyymit
    WHERE sana1ID=? or sana2ID = ?");
  if ($kysely->execute(array($sanaid, $sanaid))){
    $tulos = $kysely->fetchObject();
    $kysely = haeYhteys()->prepare("SELECT sanaID from sana where sanaID=?");
    if($tulos->sana1id == $sanaid){
      $kysely->execute(array($tulos->sana2id));
    } else {
      $kysely->execute(array($tulos->sana1id));
    }
    return $kysely->fetchObject();
  } else {
    return null;
  }
 }

 function antonyymihaku($sana){
  $sanaid = sanahaku($sana)->sanaid;
  $kysely = haeYhteys()->prepare("SELECT sana1ID, sana2ID FROM antonyymit
    WHERE sana1ID=? or sana2ID = ?");
  if ($kysely->execute(array($sanaid, $sanaid))){
    $tulos = $kysely->fetchObject();
    $kysely = haeYhteys()->prepare("SELECT sanaID from sana where sanaID=?");
    if($tulos->sana1id == $sanaid){
      $kysely->execute(array($tulos->sana2id));
    } else {
      $kysely->execute(array($tulos->sana1id));
    }
    return $kysely->fetchObject();
  } else {
    return null;
  }

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




