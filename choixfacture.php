<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CROSL</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
<?php
require("connexion.php");

$id = $_COOKIE['id'];
$token = $_COOKIE['token'];

require("token.php");
?>
    <form>
        <h1>Facture</h1>
        <div align="center">
            <button type="submit" formaction="creefacture.php" formmethod="post">Créer</button>
            <button type="submit" formaction="consulterfacture.php" formmethod="post">Consulter</button>
            <button type="submit" formaction="choix.php" formmethod="post">Retour</button>
        </div>
      </form>
</body>
</html>