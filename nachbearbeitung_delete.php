<?php
  include 'phptodatenbank.php';
  $id = $_GET['id'];     // das holt sich die id oben aus der url rauß
  $sql = "DELETE FROM `nachbearbeitungsmoeglichkeiten` WHERE `nachbearbeitungsmoeglichkeiten`.`id` = $id";   // delete query, löscht  eine zeile

  $conn->query($sql);
  $conn->close();
 header("location: nachbearbeitung.php");  //   Schickt einen nach dem ausführen der Funktionalität wieder zurück zur "hauptseite"
?>
