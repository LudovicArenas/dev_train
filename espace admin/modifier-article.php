<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid= $_GET['id'];
    $recupArticle=$bdd->prepare('SELECT * FROM articles WHERE id=?');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() >0){
        $articlesInfos = $recupArticle->fetch();
        $titre =  $articlesInfos['titre'];
        $description =  str_replace('<br/>','',$articlesInfos['description']);
        
        if(isset($_POST['valider'])){
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $description_saisie = nl2br(htmlspecialchars($_POST['description']));
    
            $uspdateArticle = $bdd->prepare('UPDATE articles SET titre = ?, description = ? WHERE id = ?');
            $uspdateArticle->execute(array($titre_saisi,$description_saisie,$getid));
            header('location: articles.php');
        }



    } else{
        echo "Aucun article trouvé";
    }
}else{
    echo "Aucun identifaint trouvé";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
</head>
<body>
    <form method="POST" action="" >
        <input type="text" name="titre" value="<?= $titre; ?>">
        <br>
        <textarea name="description"> <?= $description; ?> </textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>