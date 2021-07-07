

  <?php
 include 'phptodatenbank.php';
  $sql = "select * from materialien";  // query formulieren
  $result = $conn->query($sql); // query ausführen
  while($row = $result->fetch_assoc()) {

    if(isset($_GET['id']) && $row['Material_id'] == $_GET['id']) {   // Die SuperGlobal $_GET schaut was in der url bei ?id= steht, so weiß php was man meint   wenn nix da ist passiert auch nix
        echo '<form class="form-inline m-2" action="update.php" method="POST">';  // post nach update.php
        echo '<td><input type="text" class="form-control" name="name" value="'.$row['Material_name'].'"></td>';    // das sind dann die auswahlmöglichkeiten wenn man auf update geklickt hat
        echo '<td><input type="number" step ="any" class="form-control" name="preis" value="'.$row['preisprocm'].'"></td>';
        echo '<td><button type="submit" class="btn btn-primary">Speichern</button></td>';   // Der "Speichern Button"
        echo '<input type="hidden" name="id" value="'.$row['Material_id'].'">';
        echo '</form>';
      } else {
    echo "<tr>";  // <tr> definiert eine Reihe bestehend aus einzelnen Zeilen
    echo "<td>" . $row['Material_name'] . "</td>";    // 2 Spalten    1x Name  und 1x Preis
    echo "<td>" . $row['preisprocm'] . "</td>";
    echo '<td><a class="btn btn-primary" href="backendindex.php?id=' . $row['Material_id'] . '" role="button">Update</a></td>'; // Das hier ist der Update Button, wenn man ihn klickt verändert sichdie url und bekommt die id von der zeile auf die man gedrückt hat

    echo '<td><a class="btn btn-danger" href="delete.php?id=' . $row['Material_id'] . '" role="button">Löschen</a></td>';        // Das hier ist der Delete Button gleiche Logik wie update button
    echo "</tr>"; // Closing Tag für die Reihe
  }
}
  $conn->close();

?>
