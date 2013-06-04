<?php
  session_start();
?><!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Sanatietokanta</title>
 <link rel="stylesheet" type="text/css" href="tyylit.css">
 </head>
<body>

<div id="container">

<div id="header">
<h1 style="margin-bottom:0;"><a href="etusivu-alpha.php">Sanakirja</a></h1></div>

<div id="menu">
<form name="input" action="sanahaku.php" method="get">
Sanahaku: <input type="text" name="sana">
<input type="submit" value="Hae">
</form> 
<a href="kaannoshaku.php?sana=">Käännökset</a>
<a href="synonyymit.php?sana=">Synonyymit</a>
<a href="antonyymit.php?sana=">Antonyymit</a>
<a href="sanalista.php?kieli=fin">Sanalista</a>
<?php
 if (isset($_SESSION['kayttaja'])){ ?>
	<a href="sanamuokkaus.php">Hallitse sanoja</a>
 <?php } else{ ?>
	<a href="kirjaudu.php">Kirjaudu</a>
 <?php } ?>
</div>
