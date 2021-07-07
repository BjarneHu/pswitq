<?php
  include 'phptodatenbank.php';
  $id = $_POST['id'];           // hier werden sich die werte geholt
  $Mat_name = $_POST['name'];
  $preis = $_POST['preis'];
  $sql = "UPDATE `materialien` SET `preisprocm`='$preis',`Material_name`='$Mat_name' WHERE `Material_id`='$id'";  // query wird forumliert
  $result = $conn->query($sql);    //query ausgeführt
  $conn->close();
  header("location: backendindex.php");   // Schickt einen zur "Hauptseite" zurück
?>