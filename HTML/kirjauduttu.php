<?php
  session_start();?>
<div id="content">
<?php
  $kayt = $_POST["kayt"];
  $sala = $_POST["sala"];

  function tunnistaKayttaja($kayt, $sala){
  // tähän haku tietokannasta
  return true;
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
