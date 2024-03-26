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
    <h1>Créer une prestation</h1>
    <div class="inputs">
      <input type="text" placeholder="Code prestation" />
      <input type="text" placeholder="Libellé">
      <input type="text" placeholder="Prix unitaire">
    </div>
    <div align="center">
      <button type="submit">Créer</button>
    </div>
  </form>
</body>
</html>