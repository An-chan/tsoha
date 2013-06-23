<?php include("avusteet/yla.php"); ?>

<div id="content">
<h3>Sisäänkirjautuminen</h3><br>
<form name="input" action="kirjauduttu.php" method="post">
Käyttäjätunnus: <input type="text" name="kayt">
Salasana: <input type="password" name="sala">
<input type="submit" value="Kirjaudu sisään">

</form> </div>

<?php include("ala.php"); ?>
