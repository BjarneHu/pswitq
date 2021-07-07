<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h1>Bearbeiten der Nachbearbeitungsmöglichkeiten</h1>
  <table class="table">
  <tbody>
    <?php include 'nachbearbeitung_read.php'; ?>
  </tbody>
</table>
   <!-- Hier ist der "Button Bereich für die Insert/Input Funktionalität der eine Button dessen Input im weiteren als name_input und der andere dessen inhalt als material_id_input bekannt sein wird" -->
  <form class="form-inline m-2" action="nachbearbeitung_create.php" method="POST">
    <label for="name_input">Name:</label>

    <input type="text" class="form-control m-2" id="name_input" name="name_input">                 <!-- oben erklärt ^  -->
    <label for="material_id_input">Zugehörigkeit:</label>
    <input type="number" class="form-control m-2" id="material_id_input" name="material_id_input">
    <button type="submit" class="btn btn-primary">Hinzufügen</button>
  </form>
</div>
</body>
</html>
