<?php
require_once 'kyselyt.php';
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

<a href="etusivu-alpha.php">Jatka</a>
