<?php
  include 'phptodatenbank.php';     // bindet die datenbank quasi mit ein
  $sql = "SELECT * FROM `nachbearbeitungsmoeglichkeiten`";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) { // Was in dieser while schleife passiert: für jede zeile in der datenbank werden einmal die werte ausgegeben
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";      // das holt den namen rauß
    echo "<td>" . $row['material_id'] . "</td>";   // das die id die damit verbunden ist (foreign key)

    echo '<td><a class="btn btn-danger" href="nachbearbeitung_delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';    // delete Funktionalität
    echo "</tr>";
}
  $conn->close();   // Beendet die verbindung
?>
