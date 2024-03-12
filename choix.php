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
    header("Location: index.php");
}
?>
    <form>
     
        <h1>M2L CROSL</h1>
        <div align="center">
            <?php
            echo "Vous êtes bien connecté !"
            ?>
            <button type="submit" formaction="creeoumodif.html" formmethod="post">Ligue</button>
            <button type="submit" formaction="creeoumodifpresta.html" formmethod="post">Prestation</button>
            <button type="submit" formaction="choixfacture.html" formmethod="post">Facture</button>
        </div>
      </form>
</body>
</html>