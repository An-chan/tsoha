<?php include("avusteet/yla.php");
require_once 'avusteet/kyselyt.php';?>

<div id="content">
 <h3>Tervetuloa!</h3>
 <p>Tämä on web-pohjainen sanakirjatietokanta.</p>
 <p>Voit aloittaa sanojen etsimisen käyttämällä pikahakua tai valitsemalla jonkin erityishakuvaihtoehdoista. Mikäli haluat muokata tietokantaa, kirjaudu sisään.</p>
 <p>Tänään on <?php echo date("j.n.Y"); ?>.</p>
 <p>Sanoja tietokannassa: <?php $maara = sanamaara();
 echo $maara; ?>
</div>

<?php include("ala.php"); ?>
