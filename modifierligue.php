<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CROSL</title>
  <link rel="stylesheet" href="css/creeligue.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
<?php
require("connexion.php");

$id = $_COOKIE['id'];
$token = $_COOKIE['token'];
require("token.php");
?>
  <form method="post" action="modification.php">
    <h1>Modifier une ligue</h1>
      <div class="inputs">
          <label for="id_ligue">Choisir une ligue :</label>
          <select id="id_ligue" name="id_ligue">
              <?php
              try {
                  // Récupérer les noms et identifiants des ligues
                  $query = "SELECT codeclient, ligue FROM Ligue";
                  $stmt = $connexion->query($query);
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "<option value='" . $row['codeclient'] . "'>" . $row['codeclient'] . " - " . $row['ligue'] . "</option>";
                  }
              } catch (PDOException $e) {
                  echo 'Échec de la connexion à la base de données : ' . $e->getMessage();
                  exit();
              }
              ?>
          </select>
      </div>
      <div align="center">
          <button type="submit">Modifier</button>
      </div>
  </form>
</body>
</html>