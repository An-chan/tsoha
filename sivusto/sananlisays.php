<?php
require_once 'avusteet/kyselyt.php';

 /* Tiedosto tarkistaa syötteen oikeellisuuden, hyläten tyhjät syötteet,
 ja niiden ollessa oikein lisää sanan tietokantaan. Onnistumisesta tai
 epäonnistumisesta annetaan ilmoitus. */

  $sana = $_POST["sana"];
  $kieli = $_POST["kieli"];
  $maaritelma = $_POST["maaritelma"];
  $sanaluokka = $_POST["sanaluok"];
  $tyyli = $_POST["tyyli"];
  $esimerkki = $_POST["esimerkki"];
  
  if ($sana == "" || $maaritelma == "" || $maaritelma == "Sanan määritelmä (pakollinen)"){
    echo "Teit jotain väärin. Kokeile syöttää sana ja sen määritelmä.";
  } else {
    sanalisays($sana, $kieli, $maaritelma, $sanaluokka, $tyyli, $esimerkki);
  }
  
?>

<br><a href="etusivu-alpha.php">Jatka</a>
