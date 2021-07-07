<?php
  include 'phptodatenbank.php';  // Stellt quasi die Verbindung zur Datenbank her
  $name = $_POST["name"];
  $price = $_POST["preis"];
 
  $sql = "INSERT INTO `materialien`(`preisprocm`, `Material_name`) VALUES ('$price','$name')"; // query formulieren
  $conn->query($sql);   // query ausführen
  $conn->close();
  header("location: backendindex.php");    // zurück zur "Hauptseite"
?>