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
<form method="post" action="modifier.php">
    <h1>Modifier une ligue</h1>
    <div class="inputs">
        <?php


        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifier si l'ID de la ligue a été transmis
            if (isset($_POST['id_ligue'])) {
                $id_ligue = $_POST['id_ligue'];

                try {
                    // Récupérer les détails de la ligue sélectionnée
                    $query = "SELECT * FROM Ligue WHERE codeclient = :id_ligue";
                    $stmt = $connexion->prepare($query);
                    $stmt->bindParam(':id_ligue', $id_ligue, PDO::PARAM_INT);
                    $stmt->execute();
                    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Afficher le formulaire pré-rempli pour modifier la ligue
                    if ($resultat) {
                        echo "<form method='post' action='modifier.php'>";
                        echo "<label>Nom de la Ligue :</label> <input type='text' name='description' value='" . $resultat['ligue'] . "'><br>";
                        echo "<label>Nom du trésorier :</label> <input type='text' name='nom' value='" . $resultat['nom'] . "'><br>";
                        echo "<label>Adresse :</label> <input type='text' name='adresse' value='" . $resultat['adresse'] . "'><br>";
                        echo "<label>Sport :</label> <input type='text' name='sport' value='" . $resultat['sport'] . "'><br>";
                        echo "<label>Recevoir les factures ? :</label> <input type='checkbox' name='recevoir' " . ($resultat['recevoir'] ? 'checked' : '') . "><br>";
                        echo "<input type='hidden' name='id_ligue' value='" . $id_ligue . "'>";
                        echo "<button type='submit'>Enregistrer les modifications</button>";
                        echo "</form>";

                        ;

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

        ?>

    </div>
    <div align="center">
        <!--- <button type="submit">Modifier</button> --!>
    </div>
</form>
</body>
</html>