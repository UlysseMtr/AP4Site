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
<form method="post" action="creerligue.php">
    <h1>Modifier une ligue</h1>
    <div class="inputs">
        <?php

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifier si l'ID de la ligue a été transmis
            if (isset($_POST['nom_ligue'])) {
                $id_ligue = $_POST['nom_ligue'];


                try {
                    // Récupérer les détails de la ligue sélectionnée
                    $query = "SELECT * FROM Ligue WHERE codeclient = :id_ligue";
                    $stmt = $connexion->prepare($query);
                    $stmt->bindParam(':id_ligue', $id_ligue, PDO::PARAM_INT);
                    $stmt->execute();
                    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Afficher le formulaire pré-rempli pour modifier la ligue
                    if ($resultat) {
                        echo "<h2>Modifier une ligue</h2>";
                        echo "<form method='post' action='traiter_modification_ligue.php'>";
                        echo "<label>Nom de la ligue :</label> <input type='text' name='nom' value='" . $resultat['nom'] . "'><br>";
                        echo "<label>Description :</label> <input type='text' name='description' value='" . $resultat['description'] . "'><br>";
                        // Ajoutez d'autres champs si nécessaire
                        echo "<input type='hidden' name='id_ligue' value='" . $id_ligue . "'>";
                        echo "<button type='submit'>Enregistrer les modifications</button>";
                        echo "</form>";
                    } else {
                        echo "Ligue non trouvée.";
                    }
                } catch (PDOException $e) {
                    echo 'Échec de la connexion à la base de données : ' . $e->getMessage();
                    exit();
                }
            } else {
                echo "ID de la ligue non spécifié.";
            }
        }
        var_dump($id_ligue);

        ?>

    </div>
    <div align="center">
        <button type="submit">Modifier</button>
    </div>
</form>
</body>
</html>