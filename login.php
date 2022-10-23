<!-- PARTIE TRAITEMENT -->

<?php require_once './inc/init.inc.php'; // on inclut le fichier init.inc.php qui contient la connexion à la BDD

$err = '';
if(isset($_GET['action']) && $_GET['action'] == 'deco'){
    session_destroy();
    header('location:login.php');
}

if($_POST){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    

    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
    

    if($resultat->rowCount() > 0){
        $membre = $resultat->fetch(PDO::FETCH_ASSOC);
        if(password_verify($mdp, $membre['mdp'])){
            $_SESSION['membre']['id_membre'] = $membre['id_membre'];
            $_SESSION['membre']['nom'] = $membre['nom'];
            $_SESSION['membre']['prenom'] = $membre['prenom'];
            $_SESSION['membre']['pseudo'] = $membre['pseudo'];
            $_SESSION['membre']['adresse'] = $membre['adresse'];
            $_SESSION['membre']['cp'] = $membre['cp'];
            $_SESSION['membre']['ville'] = $membre['ville'];
            $_SESSION['membre']['photo'] = $membre['photo'];


            header('location:profil.php');

        }
        else{
            $err .= '<div class="alert alert-danger">Erreur sur le pseudo ou sur le mot de passe</div>';
        }
    }
    else{
        $err .= '<div class="alert alert-danger">Erreur sur le pseudo ou sur le mot de passe</div>';
    }
}


$content .= $err;































?>




<!-- PARTIE AFFICHAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Nettefliquse</title>
</head>
<body>
    <div class="logo">
        <img src="photo/My project-2.png" alt="" >
    </div>
    <form action="" method="POST">
        <h2>S'identifier</h2>
        <input type="text" name="pseudo" placeholder="Pseudo">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="submit" value="Se connecter" id="submit">
        <a href="register.php">S'inscrire</a>
    </form>
</body>
</html>