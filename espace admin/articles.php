<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['mdp']) {
    header('location: connexion.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Afficher tous les articles</title>
</head>
<body>
    <?php
        $recupArticles = $bdd->query('SELECT * FROM articles');
        while($article = $recupArticles->fetch()){
            ?>
            <div class="article" style="border: 1px solid black;">
                <h1 style="margin-left: 5px;"><?=$article['titre']; ?></h1>
                <p style="margin-left: 5px;"><?= $article['description']; ?></p>
                <a href="supprimer-article.php?id=<?= $article['id']; ?>">
                    <button style="color: white; background-color:red; margin-bottom: 10px; border:none; border-radius:5px; margin-left:10px; cursor:pointer;">Supprimer l'article</button>
                </a>

                <a href="modifier-article.php?id=<?= $article['id']; ?>">
                <button style="color: black; background-color:yellow; margin-bottom: 10px; border:none; border-radius:5px; margin-left:10px; cursor:pointer;">Modifier l'article</button>
                </a>

            </div>
            <br>
            <?php
        }
    ?>
</body>
</html>