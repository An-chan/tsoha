<?php include("yla.php"); ?>

<div id="content">
<h3>Sanalista</h3>
Valitse kieli:
<form name="haku" action="jotain" method="get">
<select name="kieli">
<option value="suomi">suomi</option>
<option value="eng">englanti</option>
</select>
<input type="submit" value="Hae"></form> 
</div>

<div id="hakutulos">
  <?php include("lista.php") ?>
 </div>

<?php include("ala.php"); ?>
