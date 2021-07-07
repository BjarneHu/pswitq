<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Sorgt für design//bootstap import halt -->
</head>
<body>
<div class="container">
  <h1>Materialien verwalten</h1>
 

  <table class="table">
    <tbody>
      <?php include 'read.php'; ?>  <!-- einbinden von read.php = gibt den datenbank inhalt und die optionen für diese aus -->
    </tbody>
  </table>

  

  <form class="form-inline m-2" action="create.php" method="POST">      <!-- post anfrage zu create.php-->
    <label for="name">Name:</label>
    <input type="text" class="form-control m-2" id="name" name="name">  <!-- nimmt text auf (textfeld)-->

    <label for="preis">Preis:</label>
    <input type="number" step="any" class="form-control m-2" id="preis" name="preis">   <!-- step muss auf = any damit auch komma zahlen funktionieren -->

    <button type="submit" class="btn btn-primary">Hinzufügen</button>     <!-- Das ist der Button mit der Beschriftung "Hinzufügen"-->
  </form>
</div>
</body>
</html>