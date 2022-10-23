<!-- PARTIE TRAITEMENT -->


<?php



require_once './inc/init.inc.php';

$err = '';




if($_POST)
{   
    
    foreach($_POST as $key => $value)
    {
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }

    if(strlen($_POST['pseudo']) <3 || strlen($_POST['pseudo']) > 20) {
        $err .= '<div class="alert alert-danger">Le pseudo doit contenir entre 3 et 20 caractères</div>';
    }

    $monExpression = '#^[a-zA-Z0-9._-]+$#';
    if(!preg_match($monExpression, $_POST['pseudo'])) {
        $err .= '<div class="alert alert-danger">Caractères autorisés : a-z A-Z 0-9 . _ -</div>';
    }

    if(strlen($_POST['mdp']) <3 || strlen($_POST['mdp']) > 20) {
        $err .= '<div class="alert alert-danger">Le mot de passe doit contenir entre 3 et 20 caractères</div>';
    }
    $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    if(!empty($_FILES['photo']))
    {
        $nom_img = time() . '' . $POST['pseudo'] . '' . $_FILES['photo']['name'];
        
        $img_doc = RACINE . "photo/$nom_img";
        $img_bdd = URL . "photo/$nom_img";

        if($_FILES['photo']['size'] <= 8000000)
        {
            $data = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            

            $tab = ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF', 'Jpg', 'Png', 'Jpeg', 'Gif'];

            if(in_array($data, $tab))
            {
                move_uploaded_file($_FILES['photo']['tmp_name'], $img_doc);
            } else {
                $content .='<div class="alert alert-danger" role="alert">
                Format non autorisé 
                </div>';
            } 
        } else {
            $content .='<div class="alert alert-danger" role="alert">
            Vérifier la taille de votre image
            </div>';
        }
    $rep= $pdo->query("INSERT INTO membre (nom, prenom, email, pseudo, adresse, cp, ville, photo, mdp) VALUES ('$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[pseudo]', '$_POST[adresse]', '$_POST[cp]', '$_POST[ville]', '$img_bdd', '$_POST[mdp]')");
    header('location:login.php');
    }
    
    $content .= $err;
}




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

    <header>
    <div class="logo2">
        <img src="photo/My project-2.png" alt="" >
        <h3>Accès illimité à vos meilleures pellicules filmographiques</h3>
        <h3>Livrées en moins de 6 semaines</h3>
    </div>
    <?php echo $content; ?>
    </header>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Qui êtes vous ?</h2>
        <label for="name"></label>
        <input type="text" name="nom" placeholder="Nom">
        <label for="prénom"></label>
        <input type="text" name="prenom" placeholder="Prénom">
        <label for="adress"></label>
        <input type="text" name="adresse" placeholder="Adresse">
        <label for="CP"></label>
        <input type="text" name="cp" placeholder="Code postal">
        <label for="Ville"></label>
        <input type="text" name="ville" placeholder="Ville">
        <label for="pseudo"></label>    
        <input type="text" name="pseudo" placeholder="Pseudo">
        <label for="email"></label>
        <input type="email" name="email" placeholder="Email">
        <label for="password"></label>
        <input type="password" name="mdp" placeholder="Mot de passe">
        <label for="photo"></label>
        <input type="file" name="photo" id="photo" placeholder="photo de profil">
        <input type="submit" value="S'inscrire" id="submit">
    </form>
</body>
</html>