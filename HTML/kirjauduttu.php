<?php
  session_start();
  $kayt = $_POST["kayt"];
  $sala = $_POST["sala"];

  function kirjautuminen($kayt, $sala){
  
  // tähän haku tietokannasta
  return true;
  }

  if (kirjautuminen($kayt, $sala)) {
	$_SESSION["kayttaja"] = $kayt;
	echo "Kiitos kirjautumisesta, {$kayt}!";
  } else {
	echo "Kirjautuminen epäonnistui. Olihan salasana oikein?";
  }
 ?>

<a href="etusivu-alpha.html">Jatka</a>

