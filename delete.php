<?php
  include 'phptodatenbank.php';
  $id = $_GET['id'];   // holt sich die id die in der url jetzt steht
  
  $sql = "DELETE FROM `materialien` WHERE `materialien`.`Material_id` = $id";  // Hier wird die Query verfasst
  
 
  $sql2 = "DELETE FROM `nachbearbeitungsmoeglichkeiten` WHERE `nachbearbeitungsmoeglichkeiten`.`Material_id` = $id";   // Diese Query löscht alle nachbearbeitungsmöglichkeiten die dem Materiak zugeordnet sind, sonst kann man das Material nicht löschen (man könnte auch die zugehörigkeit auf null/was anderes setzten aber das macht bei dieser Anwendung keinen Sinn)
  $conn->query($sql2); // query ausgeführt
  $conn->query($sql);  // query ausgeführt    
  // Die Fehlerbehandlung fehlt, aber hier sollten eigentlich keine Fehler auftreten // man sieht ja dann das es nen fehler gab wenn das ding nicht verschwindet
  
  $conn->close();
  header("location: backendindex.php");
?>