<!-- PARTIE TRAITEMENT -->

<?php require_once './inc/init.inc.php'; // on inclut le fichier init.inc.php qui contient la connexion à la BDD


































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
    <form action="POST">
        <h2>S'identifier</h2>
        <input type="text" name="pseudo" placeholder="Pseudo ou email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" value="Se connecter" id="submit">
        <a href="register.php">S'inscrire</a>
    </form>
</body>
</html>