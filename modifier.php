<?php
require("connexion.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'ID de la ligue a été transmis
    if (isset($_POST['id_ligue'])) {
        $id_ligue = $_POST['id_ligue'];

        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $ligue = $_POST['description'];
        $adresse = $_POST['adresse'];
        $sport = $_POST['sport'];


        // Vérifier si la case "recevoir" a été cochée
        $recevoir = isset($_POST['recevoir']) ? 1 : 0;

        try {
            // Préparer la requête SQL pour mettre à jour la ligue
            $query = "UPDATE Ligue SET ligue = :ligue, nom = :nom, adresse = :adresse, recevoir = :recevoir, sport = :sport WHERE codeclient = :id_ligue";
            $stmt = $connexion->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':ligue', $ligue);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':sport', $sport);
            $stmt->bindParam(':recevoir', $recevoir, PDO::PARAM_INT);
            $stmt->bindParam(':id_ligue', $id_ligue);

            // Exécuter la requête
            $stmt->execute();
            ?><form>
            <div class="inputs">
            </div>
            <div align="center">
                <button type="submit" formaction="creeoumodif.php" formmethod="post">Retour</button>
            </div>
            </form>
            </body>
            </html>
<?php
exit();
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la ligue : " . $e->getMessage();
        }
    } else {
        echo "ID de la ligue non spécifié.";
    }
}
?>