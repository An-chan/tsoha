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
    return $kysely;
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
  $row = sanahaku($sana)->fetch();
  $sanaid = $row["sanaid"];
  $kysely = haeYhteys()->prepare("SELECT sanaid from sana JOIN kaannos ON sanaid = kaannos.sana1id WHERE sana2id = ? UNION SELECT sanaid from sana JOIN kaannos ON sanaid = kaannos.sana2id WHERE sana1id = ? ");
  if ($kysely->execute(array($sanaid, $sanaid))){
    return $kysely;
  } else {
    return null;
  }
 }

 function synonyymihaku($sana){
  $row = sanahaku($sana)->fetch();
  $sanaid = $row["sanaid"];
  $kysely = haeYhteys()->prepare("SELECT sanaid from sana JOIN synonyymit ON sanaid = synonyymit.sana1id WHERE sana2id = ? UNION SELECT sanaid from sana JOIN synonyymit ON sanaid = synonyymit.sana2id WHERE sana1id = ? ");
  if ($kysely->execute(array($sanaid, $sanaid))){
    return $kysely;
  } else {
    return null;
  }
 }

 function antonyymihaku($sana){
  $row = sanahaku($sana)->fetch();
  $sanaid = $row["sanaid"];
  $kysely = haeYhteys()->prepare("SELECT sanaid from sana JOIN antonyymit ON sanaid = antonyymit.sana1id WHERE sana2id = ? UNION SELECT sanaid from sana JOIN antonyymit ON sanaid = antonyymit.sana2id WHERE sana1id = ? ");
  if ($kysely->execute(array($sanaid, $sanaid))){
    return $kysely;
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
 
 function seuraavaID(){
  $kysely = haeYhteys()->prepare("SELECT MAX(sanaid) as suurin FROM sana");
  $kysely->execute();
  $suurin = $kysely->fetchObject()->suurin;
  return $suurin + 1 ;
 }
 
 function sanalisays($sana, $kieli, $maaritelma, $sanaluokka, $tyyli, $esimerkki){
  $kysely = haeYhteys()->prepare("INSERT INTO sana (sanaID, sana, kieliID, maaritelma, sanaluokka, tyyli, esimerkki) VALUES (?, ?, ?, ?, ?, ?, ?);");
  $koodi = sanamaara() + 1;
  if ($kysely->execute(array($koodi, $sana, $kieli, $maaritelma, $sanaluokka, $tyyli, $esimerkki))){
    echo "lisäys onnistui";
  } else {
    echo "jotain meni vikaan...";
  }
 }
 
 function sanapoisto($sanaid){
  $kysely = haeYhteys()->prepare("DELETE FROM sana WHERE sanaID=?;");
  if ($kysely->execute(array($sanaid))){
    return true;
  } else {
    return false;
  }
 }
 
 function lisaaKaannos($sana1id, $sana2id){
  $kysely = haeYhteys()->prepare("INSERT INTO kaannos (sana1ID, sana2ID) VALUES (?, ?);");
  if ($kysely->execute(array($sana1id, $sana2id))){
    return true;
  } else {
    return false;
  }
 }
 
 function lisaaSynonyymi($sana1id, $sana2id){
  $kysely = haeYhteys()->prepare("INSERT INTO synonyymit (sana1ID, sana2ID) VALUES (?, ?);");
  if ($kysely->execute(array($sana1id, $sana2id))){
    return true;
  } else {
    return false;
  }
 }
 
 function lisaaAntonyymi($sana1id, $sana2id){
  $kysely = haeYhteys()->prepare("INSERT INTO antonyymit (sana1ID, sana2ID) VALUES (?, ?);");
  if ($kysely->execute(array($sana1id, $sana2id))){
    return true;
  } else {
    return false;
  }
 } 
  
