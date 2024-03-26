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

$sport = $_POST['sport'];
$adresse = $_POST['adresse'];
$nomligue = $_POST['nomligue'];
$nom = $_POST['nom'];

// Vérifier si la case recevoir a été cochée
if (isset($_POST['recevoir']) && $_POST['recevoir'] == 'on') {
    $active = 1;
} else {
    $active = 0;
}


try {
    // Obtenez le dernier codeclient
    $query = "SELECT MAX(codeclient) AS dernier_code FROM Ligue";
    $st = $connexion->prepare($query);
    $st->execute();
    $resultat = $st->fetch(PDO::FETCH_ASSOC);
    $dernierCode = $resultat['dernier_code'];

    // Incrémentez le dernier codeclient de 1
    $idligue = $dernierCode + 1;

    $sql = "INSERT INTO Ligue (codeclient, ligue, nom, adresse, recevoir,
    sport) VALUES ('$idligue', '$nomligue', '$nom', '$adresse', '$active', '$sport');";
    $stmt = $connexion->prepare($sql);

    // Exécuter la requête
    $stmt->execute();
    echo "La Ligue a bien été enregistrée dans la base de données.";
} catch (PDOException $e) {
    echo "Erreur lors de l'enregistrement de la ligue dans la base de données : " . $e->getMessage();
}

$id = $_COOKIE['id'];
$token = $_COOKIE['token'];

require("token.php");
?>
  <form method="post" action="creerligue.php">

    <h1>Créer une ligue</h1>
    <div class="inputs">
      <input type="text" name="nom" placeholder="Nom trésorier" />
        <input type="text" name="nomligue" placeholder="Nom ligue">
      <input type="text" name="sport" placeholder="Sport">
        <label>Recevoir ?</label>
        <input type="checkbox" name="recevoir" placeholder="recevoir?">
      <input type="text" name="adresse" placeholder="Adresse">
    </div>
    <div align="center">
      <button type="submit">Créer</button>
    </div>
  </form>
</body>
</html>