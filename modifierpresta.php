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

if ($token){
    $req = $connexion->query("SELECT * FROM compteadmin WHERE id = '$id' AND token = '$token'");
    $rep = $req->fetch();

    if ($rep['pseudo'] != false){
        echo "Vous êtes bien connecté ".$rep['pseudo']." !";
    }
}else{
    header("Location: error.php");
}
?>
  <form>
    <h1>Modifier une prestation</h1>
    <div class="inputs">
      <input type="text" placeholder="Prestation" />
      <input type="text" placeholder="Code prestation">
      <input type="text" placeholder="Libellé">
      <input type="text" placeholder="Prix Unitaire">
    </div>
    <div align="center">
      <button type="submit">Modifier</button>
    </div>
  </form>
</body>
</html>