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
$servername = "localhost";
$username = "root";
$password = "password";

$connexion = new PDO("mysql:host=$servername;dbname=M2L", $username, $password);

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
    <h1>Créer une facture</h1>
    <div class="inputs">
      <input type="text" placeholder="Ligue" />
      <input type="text" placeholder="Numéro Facture">
      <input type="text" placeholder="Code prestation">
      <input type="text" placeholder="Ajouter prestation">
      <input type="text" placeholder="Quantité">
      <input type="text" placeholder="Adresse">
    </div>
    <div align="center">
      <button type="submit">Créer</button>
    </div>
  </form>
</body>
</html>