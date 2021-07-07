<?php
  include 'phptodatenbank.php';
  $name = $_POST["name_input"];
  $id = $_POST["material_id_input"];


  $sql = "INSERT INTO `nachbearbeitungsmoeglichkeiten`( `name`, `material_id`) VALUES ( '$name','$id')";   // Insert query, fügt eine neue zeile hinzu

  $conn->query($sql); // hier wird die sql query ausgeführt
  $conn->close();
  header("location: nachbearbeitung.php");      //   Schickt einen nach dem ausführen der Funktionalität wieder zurück zur "hauptseite"
 ?>
?>
