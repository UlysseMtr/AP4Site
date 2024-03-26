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

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = htmlentities($_POST['id']);
            $mdp = htmlentities($_POST['mdp']);
            // Vérifiez que les données rentrées ne sont pas vide
            if ($id != "" && $mdp != ""){
                // Création d'un token aléatoire
                $token = bin2hex((random_bytes(32)));

                // Connexion à la base de donnée
                $req = $connexion->query("SELECT * FROM compteadmin WHERE id = '$id' AND mdp = '$mdp'");
                $req = $req->fetch();
                if ($req['id'] != false){
                    $connexion->exec("UPDATE compteadmin SET token = '$token' WHERE id = '$id' AND mdp = '$mdp'");
                    setcookie("token", $token, time() + 3600);
                    setcookie("id", $id, time() + 3600);
                    // c'est bon --> redirection vers une autre page
                    header("Location: choix.php");
                    exit();
                }else{
                    // c'est pas bon
                    $error_msg = "Identifiant ou mdp incorrect";
                }
            }
        }
    ?>
<form method="POST" acti
      on="">

    <h1>Page Admin</h1>
    <div class="inputs">
        <input type="text" name="id" placeholder="Identifiant" />
        <input type="password" name="mdp" placeholder="Mot de passe">
    </div>
    <div align="center">
         <button type="submit" name="envoi">Se connecter</button>
    </div>
</form>

<?php
if ($error_msg){
    ?>
    <p><?php echo $error_msg; ?></p>
    <?php
}
?>
</body>
</html>