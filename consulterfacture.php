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
  <form>
    <h1>Consulter une facture</h1>
      <input type="text" placeholder="Ligue" />
      <button type="submit" formaction="facture.php" formmethod="post">Facture 1</button>
    </div>
    <br>
    <div align="center">
      <button type="submit" formaction="choixfacture.php" formmethod="post">Retour</button>
    </div>
  </form>
</body>
</html>