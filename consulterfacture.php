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