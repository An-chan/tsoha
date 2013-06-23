<?php
  session_start();
  require_once 'avusteet/kyselyt.php';

 /* kirjauduttu.php vertaa käyttäjän antamia tunnusta ja salasanaa
 tietokannasta löytyviin. Jos saadaan osuma tietokannasta, kirjataan
 käyttäjä sisään ja annetaan istunnolle hänen tunnuksensa. Jos tunnusta
 tai salasanaa ei löydy, annetaan virheilmoitus */ ?>
<div id="content">
<?php

  $kayt = $_POST["kayt"];
  $sala = $_POST["sala"];

  function tunnistaKayttaja($kayt, $sala){
   $kayttaja = tunnistaudu($kayt, $sala);
   if ($kayttaja) {
    return true;
   } else {
    return false;
   }
  }

  if (tunnistaKayttaja($kayt, $sala)) {
	$_SESSION["kayttaja"] = $kayt;
	echo "Kiitos kirjautumisesta, {$kayt}!";
  } else {
	echo "Kirjautuminen epäonnistui. Olihan salasana oikein?";
  }
 ?>
<br>
<a href="etusivu-alpha.php">Jatka</a>

</div>
