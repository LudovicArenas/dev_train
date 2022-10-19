<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['mdp']) {
    header('location: connexion.php');
}

if(isset($_POST['envoie'])){
    if(!empty($_POST['titre']) and !empty($_POST['description'])){
        $titre = htmlspecialchars($_POST['titre']);
        $description= nl2br(htmlspecialchars($_POST['description']));

        $insererArticle = $bdd->prepare('INSERT INTO articles(titre, description) VALUES(?,?)');
        $insererArticle->execute(array($titre,$description));

        echo "L'article a bien été envoyé";
    }else{
        echo "Veillez remplir tous les champs...";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un article</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="titre">
        <br>
        <textarea name="description"></textarea>
        <br><br>
        <input type="submit" name="envoie">
    </form>
</body>
</html>