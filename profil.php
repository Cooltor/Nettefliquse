<!-- PARTIE TRAITEMENT -->

<?php 
require_once './inc/init.inc.php'; 


if(!userConnected()){
    header('location:./login.php');
    exit();
}


if(isset($_GET['action']) && $_GET['action'] == 'supprimer')
{
    $pdo->query("DELETE FROM membre WHERE id_membre = '$_GET[id_membre]'");
    header ('location:login.php');
    $content .= '<div class="alert alert-success" role="alert">
    Le produit a bien été supprimé
    </div>';
}



$resultat = $pdo->query('SELECT * FROM membre WHERE pseudo = "$_POST[pseudo]"');
$membre = $resultat->fetch(PDO::FETCH_ASSOC);
$profil = '';
$photo = $_SESSION['membre']['photo'];


$content .= '<div class="text-center cercle">' ;
$content .= "<img src='$photo' width=180px>";
$content.=  "</div>" .
                        '<div class="text-center">' . 'Votre pseudo : ' . $_SESSION['membre']['pseudo'] . "</div>" . 
                        '<div class="text-center">' . 'Votre nom : ' . $_SESSION['membre']['nom'] . "</div>" .
                        '<div class="text-center">' . 'Votre prénom : ' .  $_SESSION['membre']['prenom'] . "</div>" .
                        '<div class="text-center">' . 'Votre email : ' . $_SESSION['membre']['email']  . "</div>" .
                        '<div class="text-center">' . 'Votre adresse : ' . $_SESSION['membre']['adresse'] . "</div>" .
                        '<div class="text-center">' . 'Votre ville : ' . $_SESSION['membre']['ville'] . "</div>" .
                        '<div class="text-center">' . 'Votre code postal : ' .$_SESSION['membre']['cp'] . "</div>" .
                        '<a href="?action=supprimer&id_membre='.$_SESSION['membre']['id_membre'].'">Supprimer mon profil<i class="fas fa-trash-alt"></i></a>';
?>


<!-- PARTIE AFFICHAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .cercle{
            border-radius: 50%;
            width: 100px;
            height: 100px;
            overflow: hidden;
            margin: 0 auto;
        }
    </style>
    <title>Nettefliquse</title>
</head>
<body>
    <header>
    <div class="logo2">
        <img src="photo/My project-2.png" alt="" >
        <h3>Accès illimité à vos meilleures pellicules filmographiques</h3>
        <h3>Livrées en moins de 6 semaines</h3>
    </div>
    </header>
    <h1>PROFIL</h1>

    <?php echo $content; ?> <br>
    <button id="bouton"><a href="login.php" name='deco'>Se déconnecter</a></button>
</body>
</html>